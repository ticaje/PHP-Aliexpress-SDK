<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Mediator\Post;

use Ticaje\AeSdk\Api\Traits\Mediator\ApiPostMediator;
use Ticaje\AeSdk\Api\Traits\Mediator\ApiMediator;
use Ticaje\AeSdk\Api\Mediator\Base as ParentClass;
use Ticaje\AeSdk\Api\Interfaces\Post\ProductPostInterface;

/**
 * Class Order
 * @package Ticaje\AeSdk\Api\Mediator\Get
 */
class Product extends ParentClass implements ProductPostInterface
{
    use ApiMediator, ApiPostMediator;
}
