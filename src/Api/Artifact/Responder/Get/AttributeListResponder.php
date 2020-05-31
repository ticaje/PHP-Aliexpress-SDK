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
 * Class AttributeListResponder
 * @package Ticaje\AeSdk\Api\Artifact\Responder
 */
class AttributeListResponder implements ApiResponderInterface, WorkerInterface
{
    use Responder;

    private $count;

    private $attributes = [];

    /**
     * @inheritDoc
     */
    public function process(ContractResponseInterface $response): ApiResponderInterface
    {
        $content = json_decode($response->getContent());
        isset($content->error_response) ? $this->error($content->error_response) : $this->success($content->aliexpress_category_redefining_getallchildattributesresult_response);
        return $this;
    }

    protected function success(\stdClass $response)
    {
        $data = $response->result->attributes->aeop_attribute_dto;
        $itemsCount = count($data);
        $message = $itemsCount ? "{$itemsCount} attributes fetched successfully" : 'No attributes found with such criteria';
        $this
            ->setSuccess(1)
            ->setCount($itemsCount)
            ->setAttributes($itemsCount ? $data : null)
            ->setCode(200)
            ->setMessage($message);
    }
}
