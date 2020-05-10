<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Order\Get;
use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;

/**
 * Class GetOrderTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class GetOrderListTest extends ParentClass
{
    protected $class = Get::class;

    protected $apiMethodName = 'aliexpress.solution.order.get';

    protected $params = ['page_size', 'order_status', 'current_page', 'create_date_start'];

    protected $paramKey = 'param0';

    public function testInitialOrderStatus()
    {
        $statuses = $this->instance->getOrderStatus();
        $this->assertNotEmpty($statuses, 'Assert not empty');
        $this->assertContains('FINISH', $statuses, 'Assert finish status is included');
        $this->assertContains('PLACE_ORDER_SUCCESS', $statuses, 'Assert success status is included');
        $this->assertEquals(2, count($statuses), 'Assert exactly 2 status');
    }
}
