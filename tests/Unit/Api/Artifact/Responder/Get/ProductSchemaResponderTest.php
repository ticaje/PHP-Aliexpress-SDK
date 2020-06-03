<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get;

use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;
use Ticaje\AeSdk\Api\Artifact\Responder\Get\ProductSchemaInfoResponder;

/**
 * Class ProductSchemaResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class ProductSchemaResponderTest extends ParentClass
{
    protected $class = ProductSchemaInfoResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = function () {
            $this->assertNotEmpty($this->instance->getSchema(), 'Assert product schema info not empty');
        };

        $this->launchSuccessResponse($callable, new ProductSchemaResponderContainer());
    }
}

/**
 * Class ProductSchemaResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class ProductSchemaResponderContainer
{
    public function getContent()
    {
        return '
        {
            "aliexpress_solution_product_schema_get_response":{
                "result":{
                    "success":true,
                    "error_code":"F00-00-10007-007",
                    "error_message":"duplicate sku_code, please check your input",
                    "schema":"{}"
                }
            }
        }';
    }
}
