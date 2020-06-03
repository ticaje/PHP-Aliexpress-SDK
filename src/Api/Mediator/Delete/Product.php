<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Mediator\Delete;

use Ticaje\AeSdk\Api\Mediator\Base as ParentClass;

use Ticaje\AeSdk\Api\Traits\Mediator\ApiMediator;

use Ticaje\AeSdk\Api\Interfaces\Post\ProductPostInterface;

/**
 * Class Product
 * @package Ticaje\AeSdk\Api\Mediator\Post
 */
class Product extends ParentClass implements ProductPostInterface
{
    use ApiMediator, ApiPostMediator, ApiComplexMediator;

    /**
     * @inheritDoc
     */
    public function getParamsWrapper(): string
    {
        return $this->getRequestWrapper('post');
    }
}
