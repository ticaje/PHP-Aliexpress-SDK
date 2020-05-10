<?php
declare(strict_types=1);

/**
 * API Request Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Domain\Interfaces\Request;

/**
 * Interface ServiceRequestInterface
 * @package Ticaje\AeSdk\Domain\Interfaces\Request
 */
interface ServiceRequestInterface
{
    /**
     * @return array
     * This method returns an array that is actually the service request param according to AE demands
     */
    public function getRequest(): array;
}
