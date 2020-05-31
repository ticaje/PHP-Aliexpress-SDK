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
 * Class ProductSchemaInfoResponder
 * @package Ticaje\AeSdk\Api\Artifact\Responder
 */
class ProductSchemaInfoResponder implements ApiResponderInterface, WorkerInterface
{
    use Responder;

    private $schema;

    /**
     * @inheritDoc
     */
    public function process(ContractResponseInterface $response): ApiResponderInterface
    {
        $content = json_decode($response->getContent());
        isset($content->error_response) ? $this->error($content->error_response) : $this->success($content->aliexpress_solution_product_schema_get_response);
        return $this;
    }

    protected function success(\stdClass $response)
    {
        $data = $response->result;
        $message = 'Product schema info fetched successfully';
        $this
            ->setSuccess(1)
            ->setCode(200)
            ->setMessage($message)
            ->setSchema($data);
    }
}
