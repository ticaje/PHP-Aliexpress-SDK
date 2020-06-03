<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces\Put;

use Ticaje\AeSdk\Api\Interfaces\ApiPutInterface;

use Ticaje\AeSdk\Api\Artifact\Responder\Put\ProductPutStandardResponder as BusinessResponder;
use Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Put\Normal as BusinessRequester;

/**
 * Interface ProductPostInterface
 * @package Ticaje\AeSdk\Api\Interfaces\Post
 */
interface ProductPutInterface extends ApiPutInterface
{
    const REQUEST_SERVICE_MAPPER = [
        'put' => BusinessRequester::class
    ];

    const RESPONSE_SERVICE_MAPPER = [
        'put' => BusinessResponder::class
    ];
}
