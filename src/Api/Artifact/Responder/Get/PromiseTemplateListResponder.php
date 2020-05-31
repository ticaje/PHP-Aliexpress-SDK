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
 * Class PromiseTemplateListResponder
 * @package Ticaje\AeSdk\Api\Artifact\Responder\Get
 */
class PromiseTemplateListResponder implements ApiResponderInterface, WorkerInterface
{
    use Responder;

    private $count;

    private $templates = [];

    /**
     * @inheritDoc
     */
    public function process(ContractResponseInterface $response): ApiResponderInterface
    {
        $content = json_decode($response->getContent())->aliexpress_postproduct_redefining_querypromisetemplatebyid_response->result;
        isset($content->error_code) ? $this->error($content) : $this->success($content);
        return $this;
    }

    // {"aliexpress_postproduct_redefining_querypromisetemplatebyid_response":{"result":{"template_list":{"templatelist":[{"id":0,"name":"Service Template for New Sellers"}]}},"request_id":"6q1kgx1ihhw7"}}
    protected function success(\stdClass $response)
    {
        $data = $response->template_list;
        $this
            ->setSuccess(1)
            ->setCount(count($data->templatelist)) // Whatsoever the key is since this is taken on a case by case basis
            ->setTemplates($data->templatelist) // Quite the same
            ->setCode(200)
            ->setMessage('Ok')
        ;
    }
}
