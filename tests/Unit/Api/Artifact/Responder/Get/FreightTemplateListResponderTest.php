<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get;

use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;
use Ticaje\AeSdk\Api\Artifact\Responder\Get\FreightTemplateListResponder;
use Ticaje\Contract\Patterns\Implementation\Decorator\Responder\Response;

/**
 * Class FreightTemplateListResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class FreightTemplateListResponderTest extends ParentClass
{
    protected $class = FreightTemplateListResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = function () use (&$response, &$mockedInstance) {
            $categories = $this->instance->getTemplates();
            $this->assertInternalType('array', $categories, 'Assert templates is an array');
            $this->assertNotEmpty($categories, 'Assert templates info not empty');
            $this->assertEquals(1, $this->instance->getCount(), 'Assert proper amount');
        };
        $this->launchSuccessResponse($callable, new FreightTemplateListResponderContainer());
    }
}

/**
 * Class FreightTemplateListResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class FreightTemplateListResponderContainer
{
    public function getContent()
    {
        return '{
            "aliexpress_freight_redefining_listfreighttemplate_response":{
                "result_error_desc":"System error",
                "aeop_freight_template_d_t_o_list":{
                    "aeopfreighttemplatedtolist":[
                        {
                            "template_name":"free shipping",
                            "is_default":false,
                            "template_id":10000100001
                        }
                    ]
                },
                "result_success":true
            }
        }';
    }
}
