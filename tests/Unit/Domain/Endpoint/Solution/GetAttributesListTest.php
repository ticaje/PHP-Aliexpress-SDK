<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Sku\Attribute\Get;
use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;

/**
 * Class GetAttributesListTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class GetAttributesListTest extends ParentClass
{
    protected $class = Get::class;

    protected $apiMethodName = 'aliexpress.category.redefining.getallchildattributesresult';

    protected $params = ['cate_id', 'parent_attrvalue_list', 'locale'];

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
