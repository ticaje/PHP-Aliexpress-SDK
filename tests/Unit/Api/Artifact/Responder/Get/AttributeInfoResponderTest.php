<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get;

use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;

use Ticaje\AeSdk\Api\Artifact\Responder\Get\AttributeInfoResponder;

/**
 * Class AttributeInfoResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class AttributeInfoResponderTest extends ParentClass
{
    protected $class = AttributeInfoResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = function () use (&$response, &$mockedInstance) {
            $this->assertNotEmpty($this->instance->getSkuAttributeList(), 'Assert sku attribute list not empty');
            $this->assertNotEmpty($this->instance->getCommonAttributeList(), 'Assert sku common list not empty');
        };

        $this->launchSuccessResponse($callable, new AttributeInfoResponderContainer());
    }
}

/**
 * Class AttributeInfoResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class AttributeInfoResponderContainer
{
    public function getContent()
    {
        return '{
            "aliexpress_solution_sku_attribute_query_response":{
                "result":{
                    "supporting_sku_attribute_list":{
                        "supported_sku_attribute_dto":[
                            {
                                "aliexpress_sku_name":"Color",
                                "required":false,
                                "aliexpress_sku_value_list":{
                                    "sku_value_simplified_info_dto":[
                                        {
                                            "aliexpress_sku_value_name":"Blue"
                                        }
                                    ]
                                },
                                "support_customized_name":true,
                                "support_customized_picture":true
                            }
                        ]
                    },
                    "supporting_common_attribute_list":{
                        "supported_common_attribute_dto":[
                            {
                                "aliexpress_common_attribute_name_id":10,
                                "aliexpress_common_attribute_name":"Material",
                                "required":true,
                                "aliexpress_common_attribute_value_list":{
                                    "common_attribute_value_info_dto":[
                                        {
                                            "aliexpress_common_attribute_value_id":47,
                                            "aliexpress_common_attribute_value":"Cotton"
                                        }
                                    ]
                                }
                            }
                        ]
                    }
                }
            }
        }';
    }
}
