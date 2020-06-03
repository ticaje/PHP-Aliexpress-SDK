<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Traits\Mediator;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface as DtoInterface;
use Ticaje\Contract\Patterns\Interfaces\Decorator\DecoratorInterface;

/**
 * Trait ApiPutMediator
 * @package Ticaje\AeSdk\Api\Traits\Mediator
 */
trait ApiPutMediator
{
    /**
     * @inheritDoc
     * Fetch {resource} details from AE API.
     */
    public function put(DtoInterface $generalRequest, array $serviceRequest): DecoratorInterface
    {
        return $this->launch($generalRequest, $serviceRequest, __FUNCTION__);
    }
}
