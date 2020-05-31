<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Sku\Attribute\Info;
use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;

/**
 * Class GetAttributeInfoTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class GetAttributeInfoTest extends ParentClass
{
    protected $class = Info::class;

    protected $apiMethodName = 'aliexpress.solution.sku.attribute.query';

    protected $params = ['aliexpress_category_id', 'category_id'];

    protected $paramKey = 'query_sku_attribute_info_request';
}
