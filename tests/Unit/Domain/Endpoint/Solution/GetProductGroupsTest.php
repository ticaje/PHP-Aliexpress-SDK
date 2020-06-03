<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;
use Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Get\Groups;

/**
 * Class GetProductGroupsTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class GetProductGroupsTest extends ParentClass
{
    protected $class = Groups::class;

    protected $apiMethodName = 'aliexpress.postproduct.redefining.getproductgrouplist';
}
