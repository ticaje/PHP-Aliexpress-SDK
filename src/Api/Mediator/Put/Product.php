<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Mediator\Put;

use Ticaje\AeSdk\Api\Mediator\Base as ParentClass;

use Ticaje\AeSdk\Api\Traits\Mediator\ApiMediator;
use Ticaje\AeSdk\Api\Traits\Mediator\ApiPutMediator;
use Ticaje\AeSdk\Api\Traits\Mediator\ApiComplexMediator;

use Ticaje\AeSdk\Api\Interfaces\Put\ProductPutInterface;

/**
 * Class Product
 * @package Ticaje\AeSdk\Api\Mediator\Post
 */
class Product extends ParentClass implements ProductPutInterface
{
    use ApiMediator, ApiPutMediator, ApiComplexMediator;

    /**
     * @inheritDoc
     */
    public function getParamsWrapper(): string
    {
        return $this->getRequestWrapper('put');
    }
}
