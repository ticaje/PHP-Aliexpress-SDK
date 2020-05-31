<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get;

use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;

use Ticaje\AeSdk\Api\Artifact\Responder\Get\AttributeListResponder;

/**
 * Class AttributeListResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class AttributeListResponderTest extends ParentClass
{
    protected $class = AttributeListResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = function () use (&$response, &$mockedInstance) {
            $this->assertNotEmpty($this->instance->getAttributes(), 'Assert attribute list not empty');
            $this->assertEquals(1, $this->instance->getCount(), 'Assert proper amount');
        };

        $this->launchSuccessResponse($callable, new AttributeListResponderContainer());
    }
}

/**
 * Class AttributeListResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class AttributeListResponderContainer
{
    public function getContent()
    {
        return '{
                "aliexpress_category_redefining_getallchildattributesresult_response":{
                    "result":{
                        "attributes":{
                            "aeop_attribute_dto":[
                                {
                                    "attribute_show_type_value":"list_box",
                                    "customized_name":false,
                                    "customized_pic":false,
                                    "id":11,
                                    "input_type":"STRING",
                                    "key_attribute":false,
                                    "names":"{\"en\":\"ACT Model\",\"zh\":\"ACT型号\"}",
                                    "required":true,
                                    "sku":true,
                                    "sku_style_value":"COLOUR_ATLA",
                                    "spec":1,
                                    "units":{
                                        "aeop_unit":[
                                            {
                                                "rate":"1",
                                                "unit_name":"cm"
                                            }
                                        ]
                                    },
                                    "values":{
                                        "aeop_attr_value_dto":[
                                            {
                                                "attributes":{
                                                    "json":[
                                                        "[{\"visible\":true",
                                                        "\"values\":[{\"names\":{\"en\":\"M501\"",
                                                        "\"zh\":\"M501\"}",
                                                        "\"attributes\":[]",
                                                        "\"id\":200091888}",
                                                        "{\"names\":{\"en\":\"M621\"",
                                                        "\"zh\":\"M621\"}",
                                                        "\"attributes\":[]",
                                                        "\"id\":200568333}",
                                                        "{\"names\":{\"en\":\"Other\"",
                                                        "\"zh\":\"其它\"}",
                                                        "\"attributes\":[]",
                                                        "\"id\":4}]",
                                                        "\"attributeShowTypeValue\":\"list_box\"",
                                                        "\"units\":null",
                                                        "\"required\":false",
                                                        "\"customizedPic\":false",
                                                        "\"spec\":0",
                                                        "\"customizedName\":false",
                                                        "\"names\":{\"en\":\"ACT Model\"",
                                                        "\"zh\":\"ACT型号\"}",
                                                        "\"keyAttribute\":false",
                                                        "\"inputType\":\"STRING\"",
                                                        "\"id\":200006215",
                                                        "\"skuStyleValue\":null",
                                                        "\"sku\":false}]"
                                                    ]
                                                },
                                                "id":11,
                                                "names":"{\"en\":\"ACT Model\",\"zh\":\"ACT型号\"}",
                                                "value_tags":"{\"sizeGroup\":\"us\"}"
                                            }
                                        ]
                                    },
                                    "visible":false,
                                    "features":"{\"AE_FEATURE_car_cascade_property\":\"1\"}"
                                }
                            ]
                        },
                        "error_code":"11",
                        "error_message":"11",
                        "success":true
                    }
                }
        }';
    }
}
