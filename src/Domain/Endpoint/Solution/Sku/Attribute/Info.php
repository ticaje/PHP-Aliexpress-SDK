<?php
declare(strict_types=1);

/**
 * Request Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Domain\Endpoint\Solution\Sku\Attribute;

use Ticaje\Contract\Patterns\Interfaces\Pool\WorkerInterface;
use Ticaje\Contract\Traits\BaseDto;
use Ticaje\AeSdk\Infrastructure\Builder\ServiceRequestBuilder;
use Ticaje\AeSdk\Domain\Interfaces\Request\ServiceRequestInterface;

/**
 * Class Info
 * @package Ticaje\AeSdk\Domain\Endpoint\Solution\Sku\Attribute\Info
 */
class Info implements ServiceRequestInterface, WorkerInterface
{
    use BaseDto, ServiceRequestBuilder;

    private $apiMethodName = 'aliexpress.solution.sku.attribute.query';

    private $aliexpressCategoryId;

    private $categoryId;

    public function getRequest(): array
    {
        return ['query_sku_attribute_info_request' => json_encode($this->build())];
    }
}
