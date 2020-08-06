<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Configuration;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * This class will streamline the values from extension manager configuration
 */
class ExtConf implements SingletonInterface
{
    /**
     * @var int
     */
    protected $rootCategory = 0;

    public function __construct()
    {
        $extConf = [];
        if (class_exists(ExtensionConfiguration::class)) {
            $extConf = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('reserve');
        } elseif (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['reserve'])) {
            $extConf = unserialize(
                $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['reserve'],
                ['allowed_classes' => false]
            );
        }
        if (is_array($extConf) && count($extConf)) {
            // call setter method foreach configuration entry
            foreach ($extConf as $key => $value) {
                $methodName = 'set' . ucfirst($key);
                if (method_exists($this, $methodName)) {
                    $this->$methodName($value);
                }
            }
        }
    }

    public function getRootCategory(): int
    {
        return $this->rootCategory;
    }

    public function setRootCategory(int $rootCategory): void
    {
        $this->rootCategory = $rootCategory;
    }
}
