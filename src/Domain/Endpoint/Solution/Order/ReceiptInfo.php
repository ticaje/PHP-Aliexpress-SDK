<?php
declare(strict_types=1);

/**
 * Request Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Domain\Endpoint\Solution\Order;

use Ticaje\Contract\Patterns\Interfaces\Pool\WorkerInterface;
use Ticaje\Contract\Traits\BaseDto;
use Ticaje\AeSdk\Infrastructure\Builder\ServiceRequestBuilder;
use Ticaje\AeSdk\Domain\Interfaces\Request\ServiceRequestInterface;

/**
 * Class ReceiptInfo
 * @package Ticaje\AeSdk\Domain\Endpoint\Solution\Order
 */
class ReceiptInfo implements ServiceRequestInterface, WorkerInterface
{
    use BaseDto, ServiceRequestBuilder;

    private $apiMethodName = 'aliexpress.solution.order.receiptinfo.get';

    private $orderId;

    /**
     * @inheritDoc
     */
    public function getRequest(): array
    {
        return ['param1' => json_encode($this->build())];
    }
}
