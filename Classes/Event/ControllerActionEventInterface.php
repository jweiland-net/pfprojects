<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Event;

use TYPO3\CMS\Extbase\Mvc\Request;

interface ControllerActionEventInterface
{
    public function getRequest(): Request;

    /**
     * Get the controller name.
     * It's just "Pfprojects". It's not the full class name.
     *
     * @return string
     */
    public function getControllerName(): string;

    /**
     * Get the action name without appended "Action".
     * It's just "list" or "show"
     */
    public function getActionName(): string;

    public function getSettings(): array;
}
