<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces\Post;

use Ticaje\AeSdk\Api\Interfaces\ApiPostInterface;
use Ticaje\AeSdk\Api\Artifact\Responder\Post\ProductPostStandardResponder as BusinessResponder;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Post\Normal as BusinessRequester;

/**
 * Interface ProductPostInterface
 * @package Ticaje\AeSdk\Api\Interfaces\Post
 */
interface ProductPostInterface extends ApiPostInterface
{
    const REQUEST_SERVICE_MAPPER = [
        'post' => BusinessRequester::class
    ];

    const RESPONSE_SERVICE_MAPPER = [
        'post' => BusinessResponder::class
    ];
}
