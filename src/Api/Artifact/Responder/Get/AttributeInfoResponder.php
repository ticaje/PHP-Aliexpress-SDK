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
 * Class AttributeInfoResponder
 * @package Ticaje\AeSdk\Api\Artifact\Responder
 */
class AttributeInfoResponder implements ApiResponderInterface, WorkerInterface
{
    use Responder;

    private $skuAttributeList;

    private $commonAttributeList;

    private $status;

    /**
     * @inheritDoc
     */
    public function process(ContractResponseInterface $response): ApiResponderInterface
    {
        $content = json_decode($response->getContent());
        isset($content->error_response) ? $this->error($content->error_response) : $this->success($content->aliexpress_solution_sku_attribute_query_response);
        return $this;
    }

    protected function success(\stdClass $response)
    {
        $data = $response->result;
        $message = 'Attribute info fetched successfully';
        $this
            ->setSuccess(1)
            ->setCode(200)
            ->setMessage($message)
            ->setSkuAttributeList($data->supporting_sku_attribute_list->supported_sku_attribute_dto)
            ->setCommonAttributeList($data->supporting_common_attribute_list->supported_common_attribute_dto)
        ;
    }
}
