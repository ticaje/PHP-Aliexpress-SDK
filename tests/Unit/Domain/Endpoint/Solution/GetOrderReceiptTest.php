<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Order\ReceiptInfo;
use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;

/**
 * Class GetOrderReceiptTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class GetOrderReceiptTest extends ParentClass
{
    protected $class = ReceiptInfo::class;

    protected $apiMethodName = 'aliexpress.solution.order.receiptinfo.get';

    protected $params = ['order_id'];

    protected $paramKey = 'param1';
}
