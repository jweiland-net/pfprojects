<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\EventListener;

use JWeiland\Pfprojects\Event\PostProcessFluidVariablesEvent;
use JWeiland\Pfprojects\Pagination\ProjectPagination;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;

class AddPaginatorEventListener
{
    /**
     * @var int
     */
    protected $itemsPerPage = 15;

    public function __invoke(PostProcessFluidVariablesEvent $event): void
    {
        $paginator = new QueryResultPaginator(
            $event->getFluidVariables()['projects'],
            $this->getCurrentPage($event),
            $this->getItemsPerPage($event)
        );

        $event->addFluidVariable('paginator', $paginator);
        $event->addFluidVariable('pagination', new ProjectPagination($paginator));
    }

    protected function getCurrentPage(PostProcessFluidVariablesEvent $event): int
    {
        $currentPage = 1;
        if ($event->getRequest()->hasArgument('currentPage')) {
            $currentPage = $event->getRequest()->getArgument('currentPage');
        }
        return (int)$currentPage;
    }

    protected function getItemsPerPage(PostProcessFluidVariablesEvent $event): int
    {
        $itemsPerPage = $this->itemsPerPage;
        if (isset($event->getSettings()['pageBrowser']['itemsPerPage'])) {
            $itemsPerPage = $event->getSettings()['pageBrowser']['itemsPerPage'];
        }
        return (int)$itemsPerPage;
    }
}
