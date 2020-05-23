<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces\Get;

use Ticaje\AeSdk\Api\Interfaces\ApiGetInterface;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Merchant\Profile\Get as MerchantProfileGetRequest;
use Ticaje\AeSdk\Api\Artifact\Responder\Get\MerchantProfileResponder;

/**
 * Interface MerchantProfileGetInterface
 * @package Ticaje\AeSdk\Api\Interfaces\Get
 */
interface MerchantProfileGetInterface extends ApiGetInterface
{
    const REQUEST_SERVICE_MAPPER = [
        'get' => MerchantProfileGetRequest::class,
    ];

    const RESPONSE_SERVICE_MAPPER = [
        'get' => MerchantProfileResponder::class,
    ];
}
