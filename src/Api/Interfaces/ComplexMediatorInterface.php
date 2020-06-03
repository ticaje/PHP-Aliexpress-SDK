<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces;

/**
 * Interface ComplexMediatorInterface
 * @package Ticaje\AeSdk\Api\Interfaces
 */
interface ComplexMediatorInterface
{
    /**
     * @return string
     */
    public function getParamsWrapper(): string;
}
