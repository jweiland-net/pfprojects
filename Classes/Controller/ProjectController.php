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
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Main controller to list and show Pforzheim projects
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

    /**
     * @param int $areaOfActivity
     * @param string $sortBy
     * @param string $direction
     *
     * @Extbase\Validate("RegularExpression", options={"regularExpression": "/title|status|start_date|area_of_activity/"}, param="sortBy")
     * @Extbase\Validate("RegularExpression", options={"regularExpression": "/ASC|DESC/"}, param="direction")
     */
    public function listAction(int $areaOfActivity = 0, string $sortBy = 'status', string $direction = 'ASC'): void
    {
        $projects = $this->projectRepository->findAllSorted($areaOfActivity, $sortBy, $direction);
        $this->view->assign('projects', $projects);
        $this->view->assign('areaOfActivity', $areaOfActivity);
        $this->view->assign('sortBy', $sortBy);
        $this->view->assign('direction', $direction);
    }

    public function showAction(int $project): void
    {
        $project = $this->projectRepository->findByIdentifier($project);
        $this->view->assign('project', $project);
    }
}
