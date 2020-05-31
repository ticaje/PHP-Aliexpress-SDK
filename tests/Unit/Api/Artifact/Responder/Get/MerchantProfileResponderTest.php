<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get;

use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;
use Ticaje\Contract\Patterns\Implementation\Decorator\Responder\Response;
use Ticaje\AeSdk\Api\Artifact\Responder\Get\MerchantProfileResponder;

/**
 * Class MerchantProfileResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class MerchantProfileResponderTest extends ParentClass
{
    protected $class = MerchantProfileResponder::class;

    protected $categories;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = function () use (&$response, &$mockedInstance) {
            $this->assertNotEmpty($this->instance->getProfileInfo(), 'Assert content not empty');
        };

        $this->launchSuccessResponse($callable, new MerchantProfileResponderContainer());
    }
}

/**
 * Class MerchantProfileResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class MerchantProfileResponderContainer
{
    public function getContent()
    {
        return '{
            "aliexpress_solution_merchant_profile_get_response":{
                "country_code":"ES",
                "product_posting_forbidden":false,
                "merchant_login_id":"es1329072766xyzq",
                "shop_id":1234321,
                "shop_name":"test store",
                "shop_type":"official",
                "shop_url":"\/\/www.aliexpress.com\/store\/1234321"
            }
        }';
    }
}
