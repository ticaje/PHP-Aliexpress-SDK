<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get;

use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;

use Ticaje\AeSdk\Api\Artifact\Responder\Get\OrderListResponder;

/**
 * Class OrderListResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class OrderListResponderTest extends ParentClass
{
    protected $class = OrderListResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = function () use (&$response, &$mockedInstance) {
            $orders = $this->instance->getOrders();
            $this->assertNotEmpty($orders, 'Assert orders iss an array');
        };

        $this->launchSuccessResponse($callable, new OrderListResponderContainer());
    }
}

/**
 * Class OrderListResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class OrderListResponderContainer
{
    public function getContent()
    {
        return '{
            "aliexpress_solution_order_get_response":{
                "result":{
                    "error_message":"1",
                    "total_count":1,
                    "target_list":{
                        "order_dto":[
                            {
                                "timeout_left_time":120340569,
                                "seller_signer_fullname":"cn1234",
                                "seller_operator_login_id":"cn1234",
                                "seller_login_id":"cn1234",
                                "product_list":{
                                    "order_product_dto":[
                                        {
                                            "total_product_amount":{
                                                "currency_code":"USD",
                                                "amount":"1.01"
                                            },
                                            "son_order_status":"PLACE_ORDER_SUCCESS",
                                            "sku_code":"12",
                                            "show_status":"PLACE_ORDER_SUCCESS",
                                            "send_goods_time":"2017-10-12 12:12:12",
                                            "send_goods_operator":"WAREHOUSE_SEND_GOODS",
                                            "product_unit_price":{
                                                "currency_code":"USD",
                                                "amount":"1.01"
                                            },
                                            "product_unit":"piece",
                                            "product_standard":"",
                                            "product_snap_url":"http:\/\/www.aliexpress.com:1080\/snapshot\/null.html?orderId\\u003d1160045860056286",
                                            "product_name":"mobile",
                                            "product_img_url":"http:\/\/g03.a.alicdn.com\/kf\/images\/eng\/no_photo.gif",
                                            "product_id":2356980,
                                            "product_count":1,
                                            "order_id":222222,
                                            "money_back3x":false,
                                            "memo":"1",
                                            "logistics_type":"EMS",
                                            "logistics_service_name":"EMS",
                                            "logistics_amount":{
                                                "currency_code":"USD",
                                                "amount":"1.01"
                                            },
                                            "issue_status":"END_ISSUE",
                                            "issue_mode":"w",
                                            "goods_prepare_time":3,
                                            "fund_status":"WAIT_SELLER_CHECK",
                                            "freight_commit_day":"27",
                                            "escrow_fee_rate":"0.01",
                                            "delivery_time":"5-10",
                                            "child_id":23457890,
                                            "can_submit_issue":false,
                                            "buyer_signer_last_name":"1",
                                            "buyer_signer_first_name":"1",
                                            "afflicate_fee_rate":"0.03"
                                        }
                                    ]
                                },
                                "phone":false,
                                "payment_type":"ebanx101",
                                "pay_amount":{
                                    "currency_code":"USD",
                                    "amount":"1.01"
                                },
                                "order_status":"PLACE_ORDER_SUCCESS",
                                "order_id":1160045860056286,
                                "order_detail_url":"http",
                                "logistics_status":"NO_LOGISTICS",
                                "logisitcs_escrow_fee_rate":"1",
                                "loan_amount":{
                                    "currency_code":"USD",
                                    "amount":"1.01"
                                },
                                "left_send_good_min":"1",
                                "left_send_good_hour":"1",
                                "left_send_good_day":"1",
                                "issue_status":"END_ISSUE",
                                "has_request_loan":false,
                                "gmt_update":"2017-10-12 12:12:12",
                                "gmt_send_goods_time":"2017-10-12 12:12:12",
                                "gmt_pay_time":"2017-10-12 12:12:12",
                                "gmt_create":"2017-10-12 12:12:12",
                                "fund_status":"WAIT_SELLER_CHECK",
                                "frozen_status":"IN_FROZEN",
                                "escrow_fee_rate":1,
                                "escrow_fee":{
                                    "currency_code":"USD",
                                    "amount":"1.01"
                                },
                                "end_reason":"buyer_confirm_goods",
                                "buyer_signer_fullname":"test",
                                "buyer_login_id":"test",
                                "biz_type":"AE_RECHARGE"
                            }
                        ]
                    },
                    "page_size":1,
                    "error_code":"1",
                    "current_page":1,
                    "total_page":1,
                    "success":true,
                    "time_stamp":"1"
                }
            }
        }';
    }
}
