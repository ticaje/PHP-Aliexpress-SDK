<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Delete;

use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;
use Ticaje\AeSdk\Api\Artifact\Responder\Delete\ProductDeletedResponder;

/**
 * Class ProductStandardResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Delete
 */
class ProductStandardResponderTest extends ParentClass
{
    protected $class = ProductDeletedResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = $assertOrderInfo = function () {
            $this->assertNull($this->instance->getProductIds(), 'Assert returns no product IDs since it\'s delete related use case');
        };

        $this->launchSuccessResponse($callable, new ProductStandardResponderContainer());
    }
}

/**
 * Class ProductStandardResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Delete
 */
class ProductStandardResponderContainer
{
    public function getContent()
    {
        return '{
            "aliexpress_solution_batch_product_delete_response":{
            }
        }';
    }
}
