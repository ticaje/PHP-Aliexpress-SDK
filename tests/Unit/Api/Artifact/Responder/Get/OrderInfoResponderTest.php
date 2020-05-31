<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get;

use Ticaje\AeSdk\Api\Artifact\Responder\Get\OrderInfoResponder;
use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;

/**
 * Class OrderInfoResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class OrderInfoResponderTest extends ParentClass
{
    protected $class = OrderInfoResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = function () use (&$response, &$mockedInstance) {
            $this->assertNotEmpty($this->instance->getProductsInformation(), 'Assert products info not empty');
            $this->assertNotEmpty($this->instance->getBuyerInfo(), 'Assert buyer info not empty');
            $this->assertInternalType('array', $this->instance->getProductsInformation(), 'Assert products is an array');
        };

        $this->launchSuccessResponse($callable, new OrderInfoResponderContainer());
    }
}

/**
 * Class OrderInfoResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class OrderInfoResponderContainer
{
    public function getContent()
    {
        return '{
            "aliexpress_solution_order_info_get_response":{
                    "result":{
                        "error_message":"account not found",
                        "time_stamp":"2019-03-06 12:01:17",
                        "error_code":"F00-10-10000-001",
                        "data":{
                            "buyer_info":{
                                "login_id":"aliqatest07",
                                "last_name":"Song",
                                "first_name":"BYD",
                                "country":"IL"
                            },
                            "gmt_modified":"2019-03-06 12:01:17",
                            "receipt_address":{
                                "fax_area":"1",
                                "zip":"28108",
                                "fax_country":"04",
                                "address2":"505",
                                "detail_address":"Agustin de foxa 30",
                                "country":"ES",
                                "city":"Alcobendas",
                                "fax_number":"1",
                                "phone_number":"1",
                                "address":"1",
                                "province":"Madrid",
                                "phone_area":"+07",
                                "phone_country":"+34",
                                "contact_person":"Alejandro",
                                "mobile_no":"666666666"
                            },
                            "gmt_trade_end":"2018-03-01 12:12",
                            "is_phone":false,
                            "buyerloginid":"aliqatest07",
                            "logistics_amount":{
                                "cent":1,
                                "currency_code":"EUR",
                                "amount":"0.01",
                                "cent_factor":100,
                                "currency":{
                                    "default_fraction_digits":2,
                                    "numeric_code":978,
                                    "currency_code":"EUR",
                                    "symbol":"EUR",
                                    "display_name":"Euro"
                                }
                            },
                            "memo":"1",
                            "logisitcs_escrow_fee_rate":"0.00",
                            "order_msg_list":{
                                "global_aeop_tp_order_msg_dto":[
                                    {
                                        "id":12345678,
                                        "gmt_create":"2019-03-06 12:01:17",
                                        "gmt_modified":"2019-03-06 12:01:17",
                                        "business_order_id":1,
                                        "status":"1",
                                        "content":"1",
                                        "poster":"buyer",
                                        "sender_login_id":"cn1233",
                                        "sender_seq":2,
                                        "sender_admin_seq":1,
                                        "sender_first_name":"1",
                                        "sender_last_name":"1",
                                        "receiver_login_id":"cn12345",
                                        "receiver_seq":1,
                                        "receiver_admin_seq":1455,
                                        "receiver_first_name":"54",
                                        "receiver_last_name":"1"
                                    }
                                ]
                            },
                            "child_order_ext_info_list":{
                                "global_aeop_tp_order_product_info_dto":[
                                    {
                                        "quantity":1,
                                        "unit_price":{
                                            "cent":1,
                                            "currency_code":"EUR",
                                            "amount":"0.01",
                                            "cent_factor":100,
                                            "currency":{
                                                "default_fraction_digits":2,
                                                "numeric_code":978,
                                                "currency_code":"EUR",
                                                "symbol":"EUR",
                                                "display_name":"Euro"
                                            }
                                        },
                                        "sku":"{\"sku\":[{\"skuImg\":\"HTB1CUDKECzqK1RjSZFHq6z3CpXaw.jpg\",\"selfDefineValue\":\"Azul marino\",\"pName\":\"Color\",\"pValueId\":771,\"pValue\":\"Beige\",\"showType\":\"none\",\"pId\":14,\"order\":1},{\"skuImg\":\"\",\"selfDefineValue\":\"2XL\",\"pName\":\"Size\",\"pValueId\":100014066,\"pValue\":\"XS\",\"showType\":\"none\",\"pId\":5,\"order\":2}]}",
                                        "product_name":"Man\'s Waistcoat Unit.",
                                        "product_id":32972979985
                                    }
                                ]
                            },
                            "issue_info":{
                                "issue_model":"1",
                                "issue_status":"NO_ISSUE",
                                "issue_time":"2018-03-01 12:12"
                            },
                            "refund_info":{
                                "refund_reason":"1",
                                "refund_status":"refund_frozen",
                                "refund_coupon_amt":{
                                    "cent":1,
                                    "currency_code":"EUR",
                                    "amount":"0.01",
                                    "cent_factor":100,
                                    "currency":{
                                        "default_fraction_digits":2,
                                        "numeric_code":978,
                                        "currency_code":"EUR",
                                        "symbol":"EUR",
                                        "display_name":"Euro"
                                    }
                                },
                                "refund_cash_amt":{
                                    "cent":1,
                                    "currency_code":"EUR",
                                    "amount":"0.01",
                                    "cent_factor":100,
                                    "currency":{
                                        "default_fraction_digits":2,
                                        "numeric_code":978,
                                        "currency_code":"EUR",
                                        "symbol":"EUR",
                                        "display_name":"Euro"
                                    }
                                },
                                "refund_type":"payout_refund",
                                "refund_time":"2018-03-01 12:12"
                            },
                            "settlement_currency":"EUR",
                            "logistic_info_list":{
                                "global_aeop_tp_logistic_info_dto":[
                                    {
                                        "logistics_no":"1",
                                        "have_tracking_info":false,
                                        "recv_status_desc":"Country is not matched",
                                        "logistics_service_name":"SEUR",
                                        "ship_order_id":1234567,
                                        "gmt_send":"2018-03-01 12:12",
                                        "gmt_received":"2018-03-01 12:12",
                                        "logistics_type_code":"EMS_ZX_ZX_US",
                                        "receive_status":"default"
                                    }
                                ]
                            },
                            "pay_amount_by_settlement_cur":"1.01",
                            "id":31130700125804,
                            "frozen_status":"NO_FROZEN",
                            "issue_status":"NO_ISSUE",
                            "logistics_status":"NO_LOGISTICS",
                            "order_amount":{
                                "cent":1,
                                "currency_code":"EUR",
                                "amount":"0.01",
                                "cent_factor":100,
                                "currency":{
                                    "default_fraction_digits":2,
                                    "numeric_code":978,
                                    "currency_code":"EUR",
                                    "symbol":"EUR",
                                    "display_name":"Euro"
                                }
                            },
                            "seller_signer_fullname":"Henry Wong",
                            "over_time_left":"2019-03-26 13:01:17",
                            "order_end_reason":"1",
                            "init_oder_amount":{
                                "cent":1,
                                "currency_code":"EUR",
                                "amount":"0.01",
                                "cent_factor":100,
                                "currency":{
                                    "default_fraction_digits":2,
                                    "numeric_code":978,
                                    "currency_code":"EUR",
                                    "symbol":"EUR",
                                    "display_name":"Euro"
                                }
                            },
                            "opr_log_dto_list":{
                                "global_aeop_tp_operation_log_dto":[
                                    {
                                        "id":80000116680785810,
                                        "gmt_modified":"2019-03-06 12:01:17",
                                        "memo":"1",
                                        "action_type":"front_create_order",
                                        "child_order_id":31130700125804,
                                        "operator":"aliqatest07",
                                        "order_id":31130700125804,
                                        "gmt_create":"2018-03-01 12:12"
                                    }
                                ]
                            },
                            "child_order_list":{
                                "global_aeop_tp_child_order_dto":[
                                    {
                                        "snapshot_id":"123456",
                                        "lot_num":1,
                                        "logistics_amount":{
                                            "currency_code":"EUR",
                                            "cent":1,
                                            "amount_str":"0.01",
                                            "cent_factor":100,
                                            "currency":{
                                                "display_name":"EUR",
                                                "symbol":"EUR",
                                                "currency_code":"EUR",
                                                "numeric_code":978,
                                                "default_fraction_digits":2
                                            }
                                        },
                                        "goods_prepare_time":7,
                                        "product_attributes":"{\"sku\":[{\"skuImg\":\"HTB1CUDKECzqK1RjSZFHq6z3CpXaw.jpg\",\"selfDefineValue\":\"Azul marino\",\"pName\":\"Color\",\"pValueId\":771,\"pValue\":\"Beige\",\"showType\":\"none\",\"pId\":14,\"order\":1},{\"skuImg\":\"\",\"selfDefineValue\":\"2XL\",\"pName\":\"Size\",\"pValueId\":100014066,\"pValue\":\"XS\",\"showType\":\"none\",\"pId\":5,\"order\":2}]}",
                                        "buyer_memo":"Please change the price",
                                        "refund_info":{
                                            "refund_reason":"1",
                                            "refund_status":"refund_frozen",
                                            "refund_coupon_amt":{
                                                "currency":{
                                                    "default_fraction_digits":2,
                                                    "numeric_code":978,
                                                    "currency_code":"EUR",
                                                    "symbol":"EUR",
                                                    "display_name":"EUR"
                                                },
                                                "cent":1,
                                                "cent_factor":100,
                                                "currency_code":"EUR",
                                                "amount_str":"0.01"
                                            },
                                            "refund_cash_amt":{
                                                "currency":{
                                                    "display_name":"EUR",
                                                    "symbol":"EUR",
                                                    "currency_code":"EUR",
                                                    "numeric_code":978,
                                                    "default_fraction_digits":2
                                                },
                                                "amount_str":"0.01",
                                                "currency_code":"EUR",
                                                "cent_factor":100,
                                                "cent":1
                                            },
                                            "refund_type":"payout_refund",
                                            "refund_time":"2018-03-01 12:12"
                                        },
                                        "product_unit":"piece",
                                        "id":31130700125804,
                                        "logistics_type":"SPAIN_LOCAL_SEUR",
                                        "frozen_status":"NO_FROZEN",
                                        "issue_status":"NO_ISSUE",
                                        "order_sort_id":1,
                                        "afflicate_fee_rate":"0",
                                        "init_order_amt":{
                                            "cent":1,
                                            "currency_code":"EUR",
                                            "amount":"0.01",
                                            "cent_factor":100,
                                            "currency":{
                                                "default_fraction_digits":2,
                                                "numeric_code":978,
                                                "currency_code":"EUR",
                                                "symbol":"EUR",
                                                "display_name":"Euro"
                                            }
                                        },
                                        "child_issue_info":{
                                            "issue_time":"2016-12-12 12:12",
                                            "issue_status":"processing",
                                            "issue_model":"1"
                                        },
                                        "logistics_service_name":"SEUR",
                                        "loan_info":{
                                            "loan_amount":{
                                                "currency":{
                                                    "display_name":"EUR",
                                                    "symbol":"EUR",
                                                    "currency_code":"EUR",
                                                    "numeric_code":978,
                                                    "default_fraction_digits":2
                                                },
                                                "cent_factor":100,
                                                "amount_str":"0.01",
                                                "currency_code":"EUR",
                                                "cent":1
                                            },
                                            "loan_time":"2016-12-12 12:12"
                                        },
                                        "product_snap_url":"\/\/www.aliexpress.com\/snapshot\/null.html?orderId=31130700125804",
                                        "order_status":"PLACE_ORDER_SUCCESS",
                                        "sku_code":"001025258218376#10",
                                        "send_goods_operator":"SELLER_SEND_GOODS",
                                        "product_id":32972979985,
                                        "product_count":1,
                                        "fund_status":"NOT_PAY",
                                        "escrow_fee_rate":"0.08",
                                        "product_img_url":"HLB1NxbBKhnaK1RjSZFtq6zC2VXaO.jpg",
                                        "child_order_id":"31130700125804",
                                        "product_price":{
                                            "cent":1,
                                            "currency_code":"EUR",
                                            "amount":"0.01",
                                            "cent_factor":100,
                                            "currency":{
                                                "default_fraction_digits":2,
                                                "numeric_code":978,
                                                "currency_code":"EUR",
                                                "symbol":"EUR",
                                                "display_name":"Euro"
                                            }
                                        },
                                        "product_name":"Man\'s Waistcoat Unit.",
                                        "snapshot_small_photo_path":"http:\/\/ae01.alicdn.com\/kf\/http:\/\/ae01.alicdn.com\/kf\/HLB1NxbBKhnaK1RjSZFtq6zC2VXaO.jpg",
                                        "product_standard":"",
                                        "logistics_warehouse_type":"cainiaoInternationalWarehouse"
                                    }
                                ]
                            },
                            "gmt_create":"2019-03-06 12:01:17",
                            "seller_operator_login_id":"cn1285376574iepp",
                            "payment_type":"migs",
                            "loan_info":{
                                "loan_amount":{
                                    "cent":1,
                                    "amount":"0.01",
                                    "currency_code":"EUR",
                                    "cent_factor":100,
                                    "currency":{
                                        "display_name":"EUR",
                                        "symbol":"EUR",
                                        "currency_code":"EUR",
                                        "numeric_code":840,
                                        "default_fraction_digits":2
                                    }
                                },
                                "loan_time":"2018-03-01 12:12"
                            },
                            "order_status":"PLACE_ORDER_SUCCESS",
                            "buyer_signer_fullname":"BYD Song",
                            "gmt_pay_success":"2018-03-01 12:12",
                            "loan_status":"loan_none",
                            "seller_operator_aliidloginid":"1",
                            "fund_status":"NOT_PAY",
                            "escrow_fee":{
                                "cent":1,
                                "currency_code":"EUR",
                                "amount":"0.01",
                                "cent_factor":100,
                                "currency":{
                                    "default_fraction_digits":2,
                                    "numeric_code":978,
                                    "currency_code":"EUR",
                                    "symbol":"EUR",
                                    "display_name":"Euro"
                                }
                            },
                            "cpf_number":"57523131221"
                        }
                    }
                }
        }';
    }
}
