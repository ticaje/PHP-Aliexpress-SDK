<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get;

use Ticaje\AeSdk\Api\Artifact\Responder\Get\OrderReceiptInfoResponder;
use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;

/**
 * Class OrderReceiptResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class OrderReceiptResponderTest extends ParentClass
{
    protected $class = OrderReceiptInfoResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = $assertOrderInfo = function () {
            $this->assertNotEmpty($this->instance->getOrderInfo(), 'Assert buyer info not empty');
        };

        $this->launchSuccessResponse($callable, new OrderReceiptResponderContainer());
    }
}

/**
 * Class OrderInfoResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class OrderReceiptResponderContainer
{
    public function getContent()
    {
        return '{
            "aliexpress_solution_order_receiptinfo_get_response":{
                "result":{
                    "country_name":"Russian Federation",
                    "mobile_no":"4679974",
                    "contact_person":"Mark",
                    "phone_country":"04",
                    "phone_area":"12345",
                    "province":"Moscow",
                    "address":"address 001",
                    "phone_number":"88688435",
                    "fax_number":"88688436",
                    "detail_address":"center street No.99",
                    "city":"Babenki",
                    "country":"RU",
                    "address2":"address 001",
                    "fax_country":"400120",
                    "zip":"400120",
                    "fax_area":"203"
                }
            }
        }';
    }
}
