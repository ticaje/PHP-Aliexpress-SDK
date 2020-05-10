<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Order\Info;
use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;

/**
 * Class GetOrderTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class GetOrderInfoTest extends ParentClass
{
    protected $class = Info::class;

    protected $apiMethodName = 'aliexpress.solution.order.info.get';

    protected $params = ['ext_info_bit_flag', 'order_id'];

    protected $paramKey = 'param1';
}
