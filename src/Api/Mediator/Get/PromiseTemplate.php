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
use Ticaje\AeSdk\Api\Interfaces\Get\PromiseTemplateGetInterface;

/**
 * Class PromiseTemplate
 * @package Ticaje\AeSdk\Api\Mediator\Get
 * @todo Still to define AE API, not sure we got the right one
 */
class PromiseTemplate extends ParentClass implements PromiseTemplateGetInterface
{
    use ApiMediator, ApiGetMediator;
}
