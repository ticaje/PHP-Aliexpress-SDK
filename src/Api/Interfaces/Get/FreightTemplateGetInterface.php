<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces\Get;

use Ticaje\AeSdk\Api\Interfaces\ApiGetInterface;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Freight\Template\Get as BusinessGetFreightTemplateRequest;
use Ticaje\AeSdk\Api\Artifact\Responder\Get\FreightTemplateListResponder;

/**
 * Interface FreightTemplateGetInterface
 * @package Ticaje\AeSdk\Api\Interfaces\Get
 */
interface FreightTemplateGetInterface extends ApiGetInterface
{
    const REQUEST_SERVICE_MAPPER = [
        'list' => BusinessGetFreightTemplateRequest::class,
    ];

    const RESPONSE_SERVICE_MAPPER = [
        'list' => FreightTemplateListResponder::class,
    ];
}
