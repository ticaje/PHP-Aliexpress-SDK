<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Post;

use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;
use Ticaje\AeSdk\Api\Artifact\Responder\Post\OrderPostBySchemaResponder;

/**
 * Class ProductBySchemaResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Post
 */
class ProductBySchemaResponderTest extends ParentClass
{
    protected $class = OrderPostBySchemaResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = $assertOrderInfo = function () {
            $this->assertNotEmpty($this->instance->getProductId(), 'Assert returns product ID');
        };

        $this->launchSuccessResponse($callable, new ProductBySchemaResponderContainer());
    }
}

/**
 * Class ProductBySchemaResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Post
 */
class ProductBySchemaResponderContainer
{
    public function getContent()
    {
        return '{
            "aliexpress_solution_schema_product_instance_post_response":{
                "result":{
                    "product_id":32985684727
                }
            }
        }';
    }
}
