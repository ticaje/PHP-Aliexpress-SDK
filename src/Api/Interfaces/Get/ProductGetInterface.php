<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces\Get;

use Ticaje\AeSdk\Api\Interfaces\ApiGetInterface;

use Ticaje\AeSdk\Api\Artifact\Responder\Get\ProductSchemaInfoResponder as BusinessResponder;
use Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Schema\Get as BusinessRequester;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface as DtoInterface;
use Ticaje\Contract\Patterns\Interfaces\Decorator\DecoratorInterface;

/**
 * Interface ProductGetInterface
 * @package Ticaje\AeSdk\Api\Interfaces\Get
 */
interface ProductGetInterface extends ApiGetInterface
{
    const REQUEST_SERVICE_MAPPER = [
        'schema' => BusinessRequester::class
    ];

    const RESPONSE_SERVICE_MAPPER = [
        'schema' => BusinessResponder::class
    ];

    /**
     * @inheritDoc
     * Fetch {resource} details from AE API.
     */
    public function schema(DtoInterface $generalRequest, array $serviceRequest): DecoratorInterface;
}
