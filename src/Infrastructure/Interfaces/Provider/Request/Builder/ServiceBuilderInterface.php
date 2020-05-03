<?php
declare(strict_types=1);

/**
 * Provider Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\Builder;

/**
 * Interface ServiceBuilderInterface
 * @package Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\Builder
 */
interface ServiceBuilderInterface
{
    /**
     * @param array $request
     * @return string
     */
    public function compile(array $request = []): string;
}
