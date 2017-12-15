<?php declare(strict_types=1);
namespace JWeiland\Pfprojects\Controller;

/*
 * This file is part of the pfprojects project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use JWeiland\Pfprojects\Domain\Repository\ProjectRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * @package pfprojects
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class ProjectController extends ActionController
{
    /**
     * projectRepository
     *
     * @var ProjectRepository
     */
    protected $projectRepository;

    /**
     * inject projectRepository
     *
     * @param ProjectRepository $projectRepository
     * @return void
     */
    public function injectProjectRepository(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * pre processing of all actions
     *
     * @return void
     */
    public function initializeAction()
    {
        // if this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to NULL
        if (empty($this->settings['pidOfDetailPage'])) {
            $this->settings['pidOfDetailPage'] = null;
        }
    }

    /**
     * action list
     *
     * @param int $areaOfActivity
     * @param string $sortBy
     * @param string $direction
     *
     * @validate $sortBy RegularExpression(regularExpression=/title|status|start_date|area_of_activity/)
     * @validate $direction RegularExpression(regularExpression=/ASC|DESC/)
     *
     * @return void
     */
    public function listAction(int $areaOfActivity = 0, string $sortBy = 'status', string $direction = 'ASC')
    {
        $projects = $this->projectRepository->findAllSorted($areaOfActivity, $sortBy, $direction);
        $this->view->assign('projects', $projects);
        $this->view->assign('areaOfActivity', $areaOfActivity);
        $this->view->assign('sortBy', $sortBy);
        $this->view->assign('direction', $direction);
    }

    /**
     * action show
     *
     * @param int $project
     *
     * @return void
     */
    public function showAction(int $project) {
        $project = $this->projectRepository->findByIdentifier($project);
        $this->view->assign('project', $project);
    }
}
