<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Mediator\Get;

use Ticaje\AeSdk\Api\Interfaces\Get\ProductGetInterface;
use Ticaje\AeSdk\Api\Mediator\Base as ParentClass;

use Ticaje\AeSdk\Api\Traits\Mediator\ApiGetMediator;
use Ticaje\AeSdk\Api\Traits\Mediator\ApiMediator;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface as DtoInterface;
use Ticaje\Contract\Patterns\Interfaces\Decorator\DecoratorInterface;

/**
 * Class Order
 * @package Ticaje\AeSdk\Api\Mediator\Get
 */
class Product extends ParentClass implements ProductGetInterface
{
    use ApiMediator, ApiGetMediator;

    /**
     * @inheritDoc
     * Fetch {resource} details from AE API.
     */
    public function schema(DtoInterface $generalRequest, array $serviceRequest): DecoratorInterface
    {
        return $this->launch($generalRequest, $serviceRequest, __FUNCTION__);
    }
}
