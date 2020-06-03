<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get;

use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;
use Ticaje\AeSdk\Api\Artifact\Responder\Get\ProductGroupsResponder;

/**
 * Class ProductGroupsResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class ProductGroupsResponderTest extends ParentClass
{
    protected $class = ProductGroupsResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $singleElementLogic = function ($groups) {
            $firstElement = $groups[0];
            $this->assertTrue(is_object($firstElement), 'Assert that elements are objects');
            $this->assertTrue(property_exists($firstElement, 'group_name'), 'Assert each element has group name');
            $this->assertTrue(property_exists($firstElement, 'group_id'), 'Assert each element has group id');
        };

        $callable = function () use ($singleElementLogic) {
            $groups = $this->instance->getGroups();
            $this->assertNotEmpty($groups, 'Assert groups is not empty');
            $this->assertEquals(2, $this->instance->getCount(), 'Assert groups is not empty');
            $this->assertTrue(is_array($groups), 'Assert that groups is an array');
            $singleElementLogic($groups);
        };

        $this->launchSuccessResponse($callable, new ProductGroupsResponderContainer());
    }
}

/**
 * Class ProductGroupsResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class ProductGroupsResponderContainer
{
    public function getContent()
    {
        return '{
            "aliexpress_postproduct_redefining_getproductgrouplist_response":{
                "result":{
                    "error_code":16009999,
                    "error_message":"系统异常！",
                    "success":true,
                    "target_list":{
                        "aeop_ae_product_tree_group":[
                            {
                                "child_group_list":{
                                    "aeop_ae_product_tree_group":[
                                        {
                                            "group_name":"test112fasdfds",
                                            "group_id":262007001
                                        }
                                    ]
                                },
                                "group_name":"test112fasdfds",
                                "group_id":262007001
                            },
                            {
                                "group_name":"Mujer",
                                "group_id":1000000349089
                            }
                        ]
                    },
                    "time_stamp":"2019-01-02 11:47:53"
                }
            }
        }';
    }
}
