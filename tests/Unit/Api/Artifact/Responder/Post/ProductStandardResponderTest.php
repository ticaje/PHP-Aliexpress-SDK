<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Post;

use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;
use Ticaje\AeSdk\Api\Artifact\Responder\Post\ProductPostStandardResponder;

/**
 * Class ProductStandardResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Post
 */
class ProductStandardResponderTest extends ParentClass
{
    protected $class = ProductPostStandardResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = $assertOrderInfo = function () {
            $this->assertNotEmpty($this->instance->getProductId(), 'Assert returns product ID');
        };

        $this->launchSuccessResponse($callable, new ProductStandardResponderContainer());
    }
}

/**
 * Class ProductStandardResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Post
 */
class ProductStandardResponderContainer
{
    public function getContent()
    {
        return '{
            "aliexpress_solution_product_post_response":{
                "result":{
                    "product_id":32985684727
                }
            }
        }';
    }
}
