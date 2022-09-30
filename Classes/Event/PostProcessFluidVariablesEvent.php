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

class PostProcessFluidVariablesEvent
{
    protected Request $request;

    protected array $settings = [];

    protected array $fluidVariables = [];

    public function __construct(
        Request $request,
        array $settings,
        array $fluidVariables
    ) {
        $this->request = $request;
        $this->settings = $settings;
        $this->fluidVariables = $fluidVariables;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    public function getFluidVariables(): array
    {
        return $this->fluidVariables;
    }

    public function addFluidVariable(string $key, $value): void
    {
        $this->fluidVariables[$key] = $value;
    }
}
