<?php
declare(strict_types=1);

/**
 * Request Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Post;

use Ticaje\Contract\Patterns\Interfaces\Pool\WorkerInterface;
use Ticaje\Contract\Traits\BaseDto;
use Ticaje\AeSdk\Infrastructure\Builder\ServiceRequestBuilder;

use Ticaje\AeSdk\Domain\Interfaces\Request\ProductSendingInterface;
use Ticaje\AeSdk\Domain\Interfaces\Request\ServiceRequestInterface;
use Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Facade as ProductFacade;

/**
 * Class BySchema
 * @package Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Post
 */
class BySchema implements ServiceRequestInterface, WorkerInterface, ProductSendingInterface
{
    use BaseDto, ServiceRequestBuilder, ProductFacade;

    private $apiMethodName = 'aliexpress.solution.schema.product.instance.post';

    private $productInstanceRequest;

    public function getParamsWrapperKey(): string
    {
        return 'product_instance_request';
    }
}
