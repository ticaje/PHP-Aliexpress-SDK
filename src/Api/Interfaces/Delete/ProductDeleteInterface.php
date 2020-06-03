<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces\Post;

use Ticaje\AeSdk\Api\Interfaces\ApiDeleteInterface;

use Ticaje\AeSdk\Api\Artifact\Responder\Delete\ProductDeletedResponder as BusinessResponder;
use Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Delete\Batch as BusinessRequester;

/**
 * Interface ProductDeleteInterface
 * @package Ticaje\AeSdk\Api\Interfaces\Post
 */
interface ProductDeleteInterface extends ApiDeleteInterface
{
    const REQUEST_SERVICE_MAPPER = [
        'delete' => BusinessRequester::class
    ];

    const RESPONSE_SERVICE_MAPPER = [
        'delete' => BusinessResponder::class
    ];
}
