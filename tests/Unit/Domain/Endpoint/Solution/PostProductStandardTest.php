<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;
use Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Post\Normal;

/**
 * Class PostProductStandardTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class PostProductStandardTest extends ParentClass
{
    protected $class = Normal::class;

    protected $apiMethodName = 'aliexpress.solution.product.post';

    protected $params = ['post_product_request'];
}
