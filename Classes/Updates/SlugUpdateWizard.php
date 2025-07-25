<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Updates;

use Doctrine\DBAL\Driver\Statement;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;
use TYPO3\CMS\Core\DataHandling\SlugHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

/**
 * Updater to fill empty slug columns of project records
 */
#[UpgradeWizard('pfProjectUpdateSlug')]
class SlugUpdateWizard implements UpgradeWizardInterface
{
    /**
     * @var string
     */
    protected $tableName = 'tx_pfprojects_domain_model_project';

    /**
     * @var string
     */
    protected $fieldName = 'path_segment';

    /**
     * @var SlugHelper|null
     */
    protected $slugHelper;

    /**
     * @var array
     */
    protected $slugCache = [];

    /**
     * Return the identifier for this wizard
     * This should be the same string as used in the ext_localconf class registration
     */
    public function getIdentifier(): string
    {
        return 'pfProjectUpdateSlug';
    }

    public function getTitle(): string
    {
        return '[pfproject] Update Slug of project records';
    }

    public function getDescription(): string
    {
        return 'Update empty slug column "path_segment" of project records with an URI compatible version of the project name';
    }

    public function updateNecessary(): bool
    {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable($this->tableName);
        $queryBuilder->getRestrictions()->removeAll();
        $queryBuilder->getRestrictions()->add(GeneralUtility::makeInstance(DeletedRestriction::class));

        $amountOfRecordsWithEmptySlug = $queryBuilder
            ->count('*')
            ->from($this->tableName)->where($queryBuilder->expr()->or(
                $queryBuilder->expr()->eq(
                    $this->fieldName,
                    $queryBuilder->createNamedParameter('', Connection::PARAM_STR),
                ),
                $queryBuilder->expr()->isNull(
                    $this->fieldName,
                ),
            ))->executeQuery()
            ->fetchColumn();

        return (bool)$amountOfRecordsWithEmptySlug;
    }

    public function executeUpdate(): bool
    {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable($this->tableName);
        $queryBuilder->getRestrictions()->removeAll();
        $queryBuilder->getRestrictions()->add(GeneralUtility::makeInstance(DeletedRestriction::class));

        $statement = $queryBuilder
            ->select('uid', 'pid', 'title')
            ->from($this->tableName)->where($queryBuilder->expr()->or(
                $queryBuilder->expr()->eq(
                    $this->fieldName,
                    $queryBuilder->createNamedParameter('', Connection::PARAM_STR),
                ),
                $queryBuilder->expr()->isNull(
                    $this->fieldName,
                ),
            ))->executeQuery();

        $connection = $this->getConnectionPool()->getConnectionForTable($this->tableName);
        while ($recordToUpdate = $statement->fetch()) {
            if ((string)$recordToUpdate['title'] !== '') {
                $slug = $this->getSlugHelper()->generate($recordToUpdate, (int)$recordToUpdate['pid']);
                $connection->update(
                    $this->tableName,
                    [
                        $this->fieldName => $this->getUniqueValue(
                            (int)$recordToUpdate['uid'],
                            $slug,
                        ),
                    ],
                    [
                        'uid' => (int)$recordToUpdate['uid'],
                    ],
                );
            }
        }

        return true;
    }

    protected function getUniqueValue(int $uid, string $slug): string
    {
        $statement = $this->getUniqueSlugStatement($uid, $slug);
        $counter = $this->slugCache[$slug] ?? 1;
        while ($statement->fetch()) {
            $newSlug = $slug . '-' . $counter;
            $statement->bindValue(1, $newSlug);
            $statement->execute();

            // Do not cache every slug, because of memory consumption. I think 5 is a good value to start caching.
            if ($counter > 5) {
                $this->slugCache[$slug] = $counter;
            }
            $counter++;
        }

        return $newSlug ?? $slug;
    }

    protected function getUniqueSlugStatement(int $uid, string $slug): Statement
    {
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable($this->tableName);
        $queryBuilder->getRestrictions()->removeAll();
        $queryBuilder->getRestrictions()->add(GeneralUtility::makeInstance(DeletedRestriction::class));

        return $queryBuilder
            ->select('uid')
            ->from($this->tableName)->where($queryBuilder->expr()->eq(
                $this->fieldName,
                $queryBuilder->createPositionalParameter($slug, Connection::PARAM_STR),
            ), $queryBuilder->expr()->neq(
                'uid',
                $queryBuilder->createPositionalParameter($uid, Connection::PARAM_INT),
            ))->executeQuery();
    }

    protected function getSlugHelper(): SlugHelper
    {
        if ($this->slugHelper === null) {
            $this->slugHelper = GeneralUtility::makeInstance(
                SlugHelper::class,
                $this->tableName,
                $this->fieldName,
                $GLOBALS['TCA'][$this->tableName]['columns']['path_segment']['config'],
            );
        }

        return $this->slugHelper;
    }

    /**
     * @return string[]
     */
    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class,
        ];
    }

    protected function getConnectionPool(): ConnectionPool
    {
        return GeneralUtility::makeInstance(ConnectionPool::class);
    }
}
