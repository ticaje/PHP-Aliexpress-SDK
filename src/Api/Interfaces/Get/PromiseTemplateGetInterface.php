<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces\Get;

use Ticaje\AeSdk\Api\Interfaces\ApiGetInterface;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Promise\Template\Get as BusinessGetPromiseTemplateRequest;
use Ticaje\AeSdk\Api\Artifact\Responder\Get\PromiseTemplateListResponder;

/**
 * Interface PromiseTemplateGetInterface
 * @package Ticaje\AeSdk\Api\Interfaces\Get
 */
interface PromiseTemplateGetInterface extends ApiGetInterface
{
    const REQUEST_SERVICE_MAPPER = [
        'list' => BusinessGetPromiseTemplateRequest::class,
    ];

    const RESPONSE_SERVICE_MAPPER = [
        'list' => PromiseTemplateListResponder::class,
    ];
}
