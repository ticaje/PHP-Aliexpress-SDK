<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Post\BySchema;
use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;

/**
 * Class PostProductBySchemaTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class PostProductBySchemaTest extends ParentClass
{
    protected $class = BySchema::class;

    protected $apiMethodName = 'aliexpress.solution.schema.product.instance.post';

    protected $params = ['product_instance_request'];
}
