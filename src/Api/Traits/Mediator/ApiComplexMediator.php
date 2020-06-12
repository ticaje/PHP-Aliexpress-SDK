<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Traits\Mediator;

use Ticaje\AeSdk\Domain\Interfaces\Request\ProductSendingInterface as DomainProductPostPolicy;

/**
 * Trait ApiComplexMediator
 * @package Ticaje\AeSdk\Api\Traits\Mediator
 */
trait ApiComplexMediator
{
    /**
     * @param $method
     * @return string
     */
    private function getRequestWrapper($method)
    {
        /** @var DomainProductPostPolicy $requester */
        $requester = $this->pool->get(static::REQUEST_SERVICE_MAPPER[$method]);
        $result = $requester->getParamsWrapperKey();
        $this->pool->free($requester); // Free worker so being available now
        return $result;
    }
}
