<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Controller;

use JWeiland\Pfprojects\Domain\Repository\ProjectRepository;
use JWeiland\Pfprojects\Event\PostProcessFluidVariablesEvent;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Main controller to list and show projects
 */
class ProjectController extends ActionController
{
    /**
     * @var ProjectRepository
     */
    protected $projectRepository;

    public function injectProjectRepository(ProjectRepository $projectRepository): void
    {
        $this->projectRepository = $projectRepository;
    }

    public function initializeAction(): void
    {
        // if this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to NULL
        if (empty($this->settings['pidOfDetailPage'])) {
            $this->settings['pidOfDetailPage'] = null;
        }
    }

    public function listAction(): void
    {
        /** @var PostProcessFluidVariablesEvent $event */
        $event = $this->eventDispatcher->dispatch(
            new PostProcessFluidVariablesEvent(
                $this->request,
                $this->settings,
                [
                    'projects' => $this->projectRepository->findAllSorted(
                        0,
                        'status',
                        'ASC'
                    ),
                    'areaOfActivity' => 0,
                    'sortBy' => 'status',
                    'direction' => 'ASC',
                ]
            )
        );

        $this->view->assignMultiple($event->getFluidVariables());
    }

    /**
     * @param int $areaOfActivity
     * @param string $sortBy
     * @param string $direction
     *
     * @Extbase\Validate("RegularExpression", options={"regularExpression": "/title|status|start_date|area_of_activity/"}, param="sortBy")
     * @Extbase\Validate("RegularExpression", options={"regularExpression": "/ASC|DESC/"}, param="direction")
     */
    public function searchAction(int $areaOfActivity = 0, string $sortBy = 'status', string $direction = 'ASC'): void
    {
        /** @var PostProcessFluidVariablesEvent $event */
        $event = $this->eventDispatcher->dispatch(
            new PostProcessFluidVariablesEvent(
                $this->request,
                $this->settings,
                [
                    'projects' => $this->projectRepository->findAllSorted($areaOfActivity, $sortBy, $direction),
                    'areaOfActivity' => $areaOfActivity,
                    'sortBy' => $sortBy,
                    'direction' => $direction,
                ]
            )
        );

        $this->view->assignMultiple($event->getFluidVariables());
    }

    public function showAction(int $project): void
    {
        $this->view->assign(
            'project',
            $this->projectRepository->findByIdentifier($project)
        );
    }
}
