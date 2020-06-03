<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Artifact\Responder\Delete;

use Ticaje\Contract\Patterns\Interfaces\Pool\WorkerInterface;
use Ticaje\Contract\Patterns\Interfaces\Decorator\Responder\ResponseInterface as ContractResponseInterface;

use Ticaje\AeSdk\Api\Interfaces\ApiResponderInterface;
use Ticaje\AeSdk\Api\Artifact\Responder\Responder;

/**
 * Class ProductDeletedResponder
 * @package Ticaje\AeSdk\Api\Artifact\Responder\Delete
 */
class ProductDeletedResponder implements ApiResponderInterface, WorkerInterface
{
    use Responder;

    private $productIds;

    /**
     * @inheritDoc
     */
    public function process(ContractResponseInterface $response): ApiResponderInterface
    {
        $content = json_decode($response->getContent());
        isset($content->error_response) ? $this->error($content->error_response) : $this->success($content->aliexpress_solution_batch_product_delete_response);
        return $this;
    }

    protected function success(\stdClass $response)
    {
        $message = 'Product(s) deleted successfully';
        $this
            ->setSuccess(1)
            ->setCode(200)
            ->setProductIds(null)
            ->setMessage($message)
        ;
    }
}
