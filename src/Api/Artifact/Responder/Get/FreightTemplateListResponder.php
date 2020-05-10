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
 * Class FreightTemplateListResponder
 * @package Ticaje\AeSdk\Api\Artifact\Responder
 */
class FreightTemplateListResponder implements ApiResponderInterface, WorkerInterface
{
    use Responder;

    private $count;

    private $templates = [];

    /**
     * @inheritDoc
     */
    public function process(ContractResponseInterface $response): ApiResponderInterface
    {
        $content = json_decode($response->getContent());
        isset($content->error_response) ? $this->error($content->error_response) : $this->success($content->aliexpress_freight_redefining_listfreighttemplate_response);
        return $this;
    }

    protected function error(\stdClass $response)
    {
        $this
            ->setSuccess(0)
            ->setContent(null)
            ->setCode($response->code)
            ->setMessage($response->msg)
        ;
    }

    protected function success(\stdClass $response)
    {
        $data = $response->aeop_freight_template_d_t_o_list;
        $this
            ->setSuccess(1)
            ->setCount(count($data->aeopfreighttemplatedtolist))
            ->setTemplates($data->aeopfreighttemplatedtolist)
            ->setCode(200)
            ->setMessage('Ok')
        ;
    }
}
