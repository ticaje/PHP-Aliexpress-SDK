<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Mediator\Get;

use Ticaje\AeSdk\Api\Interfaces\Get\OrderGetInterface;
use Ticaje\AeSdk\Api\Mediator\Base as ParentClass;

use Ticaje\AeSdk\Api\Traits\Mediator\ApiGetMediator;
use Ticaje\AeSdk\Api\Traits\Mediator\ApiMediator;

/**
 * Class Order
 * @package Ticaje\AeSdk\Api\Mediator\Get
 */
class Order extends ParentClass implements OrderGetInterface
{
    use ApiMediator, ApiGetMediator;
}
