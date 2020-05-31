<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Seller\Category\Tree\Get;
use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;

/**
 * Class GetCategoriesListTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class GetCategoriesListTest extends ParentClass
{
    protected $class = Get::class;

    protected $apiMethodName = 'aliexpress.solution.seller.category.tree.query';

    protected $params = ['category_id', 'filter_no_permission'];

    /**
     * This method rewrites parent's since category entity has another of doing when it comes to paramKey.
     */
    public function testProperParams()
    {
        $request = $this->instance->getRequest();
        foreach ($this->params as $param) {
            $this->assertArrayHasKey($param, $request);
        }
    }
}
