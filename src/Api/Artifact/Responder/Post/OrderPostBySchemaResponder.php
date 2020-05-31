<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Artifact\Responder\Post;

use Ticaje\Contract\Patterns\Interfaces\Pool\WorkerInterface;
use Ticaje\Contract\Patterns\Interfaces\Decorator\Responder\ResponseInterface as ContractResponseInterface;

use Ticaje\AeSdk\Api\Interfaces\ApiResponderInterface;
use Ticaje\AeSdk\Api\Artifact\Responder\Responder;

/**
 * Class OrderPostBySchemaResponder
 * @package Ticaje\AeSdk\Api\Artifact\Responder\Post
 */
class OrderPostBySchemaResponder implements ApiResponderInterface, WorkerInterface
{
    use Responder;

    private $productId;

    /**
     * @inheritDoc
     */
    public function process(ContractResponseInterface $response): ApiResponderInterface
    {
        $content = json_decode($response->getContent());
        isset($content->error_response) ? $this->error($content->error_response) : $this->success($content->aliexpress_solution_schema_product_instance_post_response);
        return $this;
    }

    protected function success(\stdClass $response)
    {
        $data = $response->result;
        $message = 'Product was posted successfully';
        $this
            ->setSuccess(1)
            ->setCode(200)
            ->setProductId($data->product_id)
            ->setMessage($message)
        ;
    }
}
