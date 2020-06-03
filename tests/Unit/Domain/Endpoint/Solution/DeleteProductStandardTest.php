<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;
use Ticaje\AeSdk\Domain\Endpoint\Solution\Product\Delete\Batch;

/**
 * Class PutProductStandardTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class DeleteProductStandardTest extends ParentClass
{
    protected $class = Batch::class;

    protected $apiMethodName = 'aliexpress.solution.batch.product.delete';

    protected $params = ['product_ids'];
}
