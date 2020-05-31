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
 * Class OrderInfoResponder
 * @package Ticaje\AeSdk\Api\Artifact\Responder
 */
class OrderInfoResponder implements ApiResponderInterface, WorkerInterface
{
    use Responder;

    private $buyerInfo;

    private $productsInformation = [];

    private $status;

    /**
     * @inheritDoc
     */
    public function process(ContractResponseInterface $response): ApiResponderInterface
    {
        $content = json_decode($response->getContent());
        isset($content->error_response) ? $this->error($content->error_response) : $this->success($content->aliexpress_solution_order_info_get_response);
        return $this;
    }

    protected function success(\stdClass $response)
    {
        $data = $response->result->data;
        $message = 'Order info fetched successfully';
        $this
            ->setSuccess(1)
            ->setCode(200)
            ->setMessage($message)
            ->setBuyerInfo($data->buyer_info)
            ->setProductsInformation($data->child_order_list->global_aeop_tp_child_order_dto)
            ->setStatus($data->order_status)
        ;
    }
}
