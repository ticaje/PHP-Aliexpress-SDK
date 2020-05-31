<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get;

use Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\BaseTest as ParentClass;
use Ticaje\AeSdk\Api\Artifact\Responder\Get\CategoryTreeResponder;
use Ticaje\Contract\Patterns\Implementation\Decorator\Responder\Response;

/**
 * Class CategoryTreeResponderTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class CategoryTreeResponderTest extends ParentClass
{
    protected $class = CategoryTreeResponder::class;

    /**
     * Specific responder test.
     */
    public function testSuccessResponse()
    {
        $callable = function () use (&$response, &$mockedInstance) {
            $categories = $this->instance->getCategories();
            $this->assertInternalType('array', $categories, 'Assert categories is an array');
            $this->assertNotEmpty($categories, 'Assert categories info not empty');
            $this->assertEquals(2, $this->instance->getCount(), 'Assert proper amount');
        };

        $this->launchSuccessResponse($callable, new CategoryTreeResponderContainer());
    }
}

/**
 * Class CategoryTreeResponderContainer
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder\Get
 */
class CategoryTreeResponderContainer
{
    public function getContent()
    {
        return '{"aliexpress_solution_seller_category_tree_query_response":{
                    "children_category_list":{
                        "category_info":[
                            {
                                "children_category_id":5090301,
                                "is_leaf_category":true,
                                "level":2,
                                "multi_language_names":"{   \"de\": \"Mobiltelefon\",   \"ru\": \"Мобильные телефоны\",   \"pt\": \"Telefonia\",   \"in\": \"Ponsel\",   \"en\": \"Mobile Phones\",   \"it\": \"Telefoni cellulari\",   \"fr\": \"Smartphones\",   \"es\": \"Smartphones\",   \"tr\": \"Cep Telefonu\",   \"nl\": \"Mobiele telefoons\" }"
                            },
                            {
                                "children_category_id":5090302,
                                "is_leaf_category":true,
                                "level":2,
                                "multi_language_names":"{   \"de\": \"Mobiltelefon\",   \"ru\": \"Мобильные телефоны\",   \"pt\": \"Telefonia\",   \"in\": \"Ponsel\",   \"en\": \"Mobile Phones\",   \"it\": \"Telefoni cellulari\",   \"fr\": \"Smartphones\",   \"es\": \"Smartphones\",   \"tr\": \"Cep Telefonu\",   \"nl\": \"Mobiele telefoons\" }"
                            }
                        ]
                    },
                    "is_success":true
                }
        }';
    }
}
