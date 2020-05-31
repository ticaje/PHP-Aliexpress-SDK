<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Schema\Get;
use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;

/**
 * Class GetProductSchemaTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class GetProductSchemaTest extends ParentClass
{
    protected $class = Get::class;

    protected $apiMethodName = 'aliexpress.solution.product.schema.get';

    protected $params = ['aliexpress_category_id'];
}
