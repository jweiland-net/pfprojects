<?php declare(strict_types=1);
namespace JWeiland\Pfprojects\Configuration;

/*
 * This file is part of the service_bw2 project.
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

use TYPO3\CMS\Core\SingletonInterface;

/**
 * @package pfprojects
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class ExtConf implements SingletonInterface
{
    /**
     * root category
     *
     * @var int
     */
    protected $rootCategory = 0;

    /**
     * constructor of this class
     * This method reads the global configuration and calls the setter methods
     */
    public function __construct()
    {
        // get global configuration
        $extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['pfprojects']);
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

    /**
     * getter for rootCategory
     *
     * @return int
     */
    public function getRootCategory()
    {
        return $this->rootCategory;
    }

    /**
     * setter for rootCategory
     *
     * @param int $rootCategory
     * @return void
     */
    public function setRootCategory($rootCategory)
    {
        $this->rootCategory = (int)$rootCategory;
    }
}
