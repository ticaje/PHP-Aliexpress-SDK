<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces\Get;

use Ticaje\AeSdk\Api\Interfaces\ApiGetInterface;

use Ticaje\AeSdk\Api\Artifact\Responder\Get\CategoryTreeResponder;
use Ticaje\AeSdk\Domain\Endpoint\Solution\Seller\Category\Tree\Get as BusinessGetCategoryTreeRequest;

/**
 * Interface CategoryTreeInterface
 * @package Ticaje\AeSdk\Api\Interfaces\Get
 */
interface CategoryTreeInterface extends ApiGetInterface
{
    const REQUEST_SERVICE_MAPPER = [
        'list' => BusinessGetCategoryTreeRequest::class,
    ];

    const RESPONSE_SERVICE_MAPPER = [
        'list' => CategoryTreeResponder::class,
    ];
}
