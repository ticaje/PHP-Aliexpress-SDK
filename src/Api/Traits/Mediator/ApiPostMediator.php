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
 * Trait ApiPostMediator
 * @package Ticaje\AeSdk\Api\Traits\Mediator
 */
trait ApiPostMediator
{
    /**
     * @inheritDoc
     * Fetch {resource} details from AE API.
     */
    public function post(DtoInterface $generalRequest, array $serviceRequest): DecoratorInterface
    {
        return $this->launch($generalRequest, $serviceRequest, __FUNCTION__);
    }
}
