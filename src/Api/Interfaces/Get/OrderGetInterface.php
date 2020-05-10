<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces\Get;

use Ticaje\AeSdk\Api\Interfaces\ApiGetInterface;

use Ticaje\AeSdk\Api\Artifact\Responder\Get\OrderInfoResponder;
use Ticaje\AeSdk\Api\Artifact\Responder\Get\OrderListResponder;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Order\Get as BusinessGetOrdersRequest;
use Ticaje\AeSdk\Domain\Endpoint\Solution\Order\Info as BusinessGetOrderInfoRequest;

/**
 * Interface OrderGetInterface
 * @package Ticaje\AeSdk\Api\Interfaces\Get
 */
interface OrderGetInterface extends ApiGetInterface
{
    const REQUEST_SERVICE_MAPPER = [
        'list' => BusinessGetOrdersRequest::class,
        'get' => BusinessGetOrderInfoRequest::class
    ];

    const RESPONSE_SERVICE_MAPPER = [
        'list' => OrderListResponder::class,
        'get' => OrderInfoResponder::class
    ];
}
