<?php
namespace JWeiland\Pfprojects\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Stefan Froemken <projects@jweiland.net>, jweiland.net
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * @package pfproject
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class ProjectController extends ActionController {

    /**
     * projectRepository
     *
     * @var \JWeiland\Pfprojects\Domain\Repository\ProjectRepository
     */
    protected $projectRepository = null;

    /**
     * inject projectRepository
     *
     * @param \JWeiland\Pfprojects\Domain\Repository\ProjectRepository $projectRepository
     * @return void
     */
    public function injectProjectRepository(\JWeiland\Pfprojects\Domain\Repository\ProjectRepository $projectRepository) {
        $this->projectRepository = $projectRepository;
    }

    /**
     * preprocessing of all actions
     *
     * @return void
     */
    public function initializeAction() {
        // if this value was not set, then it will be filled with 0
        // but that is not good, because UriBuilder accepts 0 as pid, so it's better to set it to NULL
        if (empty($this->settings['pidOfDetailPage'])) {
            $this->settings['pidOfDetailPage'] = NULL;
        }
    }

    /**
     * action list
     *
     * @param integer $areaOfActivity
     * @param string $sortBy
     * @param string $direction
     * @validate $sortBy RegularExpression(regularExpression=/title|status|start_date|area_of_activity/)
     * @validate $direction RegularExpression(regularExpression=/ASC|DESC/)
     * @return void
     */
    public function listAction($areaOfActivity = 0, $sortBy = 'status', $direction = 'ASC') {
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
     * @return void
     */
    public function showAction($project) {
        $project = $this->projectRepository->findByIdentifier((int)$project);
        $this->view->assign('project', $project);
    }

}
