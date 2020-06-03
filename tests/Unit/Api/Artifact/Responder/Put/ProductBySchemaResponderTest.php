<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Put;

use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;
use Ticaje\AeSdk\Api\Artifact\Responder\Put\ProductPutBySchemaResponder;

/**
 * Class ProductBySchemaResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Post
 */
class ProductBySchemaResponderTest extends ParentClass
{
    protected $class = ProductPutBySchemaResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = function () {
            $this->assertNotEmpty($this->instance->getProductId(), 'Assert returns product ID');
        };

        $this->launchSuccessResponse($callable, new ProductBySchemaResponderContainer());
    }
}

/**
 * Class ProductBySchemaResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Put
 */
class ProductBySchemaResponderContainer
{
    public function getContent()
    {
        return '{
            "aliexpress_solution_schema_product_full_update_response":{
                "result":{
                    "product_id":32985684727
                }
            }
        }';
    }
}
