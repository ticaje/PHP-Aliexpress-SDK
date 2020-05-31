<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces\Get;

use Ticaje\AeSdk\Api\Interfaces\ApiGetInterface;

use Ticaje\AeSdk\Api\Artifact\Responder\Get\AttributeInfoResponder;
use Ticaje\AeSdk\Api\Artifact\Responder\Get\AttributeListResponder;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Sku\Attribute\Get as BusinessGetAttributeListRequest;
use Ticaje\AeSdk\Domain\Endpoint\Solution\Sku\Attribute\Info as BusinessGetAttributeInfoRequest;

/**
 * Interface AttributeGetInterface
 * @package Ticaje\AeSdk\Api\Interfaces\Get
 */
interface AttributeGetInterface extends ApiGetInterface
{
    const REQUEST_SERVICE_MAPPER = [
        'list' => BusinessGetAttributeListRequest::class,
        'get' => BusinessGetAttributeInfoRequest::class
    ];

    const RESPONSE_SERVICE_MAPPER = [
        'list' => AttributeListResponder::class,
        'get' => AttributeInfoResponder::class
    ];
}
