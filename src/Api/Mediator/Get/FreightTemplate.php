<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Mediator\Get;

use Ticaje\AeSdk\Api\Traits\Mediator\ApiGetMediator;
use Ticaje\AeSdk\Api\Traits\Mediator\ApiMediator;
use Ticaje\AeSdk\Api\Mediator\Base as ParentClass;
use Ticaje\AeSdk\Api\Interfaces\Get\FreightTemplateGetInterface;

/**
 * Class FreightTemplate
 * @package Ticaje\AeSdk\Api\Mediator\Get
 * This is the guy in charge of orchestrating all order-get related calls
 */
class FreightTemplate extends ParentClass implements FreightTemplateGetInterface
{
    use ApiMediator, ApiGetMediator;
}
