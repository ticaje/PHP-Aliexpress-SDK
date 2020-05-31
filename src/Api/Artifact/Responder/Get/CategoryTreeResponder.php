<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Artifact\Responder\Get;

use Ticaje\Contract\Patterns\Interfaces\Pool\WorkerInterface;
use Ticaje\Contract\Patterns\Interfaces\Decorator\Responder\ResponseInterface as ContractResponseInterface;

use Ticaje\AeSdk\Api\Interfaces\ApiResponderInterface;
use Ticaje\AeSdk\Api\Artifact\Responder\Responder;

/**
 * Class CategoryTreeResponder
 * @package Ticaje\AeSdk\Api\Artifact\Responder
 */
class CategoryTreeResponder implements ApiResponderInterface, WorkerInterface
{
    use Responder;

    private $count;

    private $categories = [];

    /**
     * @inheritDoc
     */
    public function process(ContractResponseInterface $response): ApiResponderInterface
    {
        $content = json_decode($response->getContent());
        isset($content->error_response) ? $this->error($content->error_response) : $this->success($content->aliexpress_solution_seller_category_tree_query_response);
        return $this;
    }

    protected function success(\stdClass $response)
    {
        $itemsCount = 0;
        $items = null;
        if (isset($response->children_category_list)) {
            $data = $response->children_category_list;
            $itemsCount = count($data->category_info);
            $items = $data->category_info;
        }
        $message = $itemsCount ? "{$itemsCount} categories fetched successfully" : 'No categories found with such criteria';
        $this
            ->setSuccess(1)
            ->setCount($itemsCount)
            ->setCategories($items)
            ->setCode(200)
            ->setMessage($message);
    }
}
