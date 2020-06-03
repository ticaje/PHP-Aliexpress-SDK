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
 * Class ProductGroupsResponder
 * @package Ticaje\AeSdk\Api\Artifact\Responder
 */
class ProductGroupsResponder implements ApiResponderInterface, WorkerInterface
{
    use Responder;

    private $groups;

    private $count;

    /**
     * @inheritDoc
     */
    public function process(ContractResponseInterface $response): ApiResponderInterface
    {
        $content = json_decode($response->getContent());
        isset($content->error_response) ? $this->error($content->error_response) : $this->success($content->aliexpress_postproduct_redefining_getproductgrouplist_response);
        return $this;
    }

    protected function success(\stdClass $response)
    {
        $data = $response->result->target_list;
        $groups = $data->aeop_ae_product_tree_group;
        $message = 'Product groups fetched successfully';
        $count = count($groups);
        $this
            ->setSuccess(1)
            ->setCode(200)
            ->setMessage($message)
            ->setCount($count)
            ->setGroups($groups);
    }
}
