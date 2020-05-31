<?php
declare(strict_types=1);

/**
 * Request Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Schema;

use Ticaje\Contract\Patterns\Interfaces\Pool\WorkerInterface;
use Ticaje\Contract\Traits\BaseDto;

use Ticaje\AeSdk\Infrastructure\Builder\ServiceRequestBuilder;
use Ticaje\AeSdk\Domain\Interfaces\Request\ServiceRequestInterface;

/**
 * Class Get
 * @package Ticaje\AeSdk\Domain\Endpoint\Solution\Order
 */
class Get implements ServiceRequestInterface, WorkerInterface
{
    use BaseDto, ServiceRequestBuilder;

    private $apiMethodName = 'aliexpress.solution.product.schema.get';

    private $aliexpressCategoryId;

    public function getRequest(): array
    {
        return $this->build();
    }
}
