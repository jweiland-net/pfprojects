<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Event;

use TYPO3\CMS\Extbase\Mvc\RequestInterface;

class PostProcessFluidVariablesEvent
{
    protected RequestInterface $request;

    /**
     * @var array<string, mixed>
     */
    protected array $settings = [];

    /**
     * @var array<string, mixed>
     */
    protected array $fluidVariables = [];

    /**
     * @param array<string, mixed> $settings
     * @param array<string, mixed> $fluidVariables
     */
    public function __construct(
        RequestInterface $request,
        array $settings,
        array $fluidVariables,
    ) {
        $this->request = $request;
        $this->settings = $settings;
        $this->fluidVariables = $fluidVariables;
    }

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @return array<string, mixed>
     */
    public function getSettings(): array
    {
        return $this->settings;
    }

    /**
     * @return array<string, mixed>
     */
    public function getFluidVariables(): array
    {
        return $this->fluidVariables;
    }

    public function addFluidVariable(string $key, mixed $value): void
    {
        $this->fluidVariables[$key] = $value;
    }
}
