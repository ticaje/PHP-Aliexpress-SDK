<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Traits\Mediator;

use Ticaje\Contract\Patterns\Interfaces\Decorator\DecoratorInterface;

use Ticaje\AeSdk\Infrastructure\Interfaces\DtoInterface;

use Ticaje\AeSdk\Api\Interfaces\ApiResponderInterface;

/**
 * Trait ApiMediator
 * @package Ticaje\AeSdk\Api\Traits\Mediator
 */
trait ApiMediator
{
    /**
     * @param DtoInterface $generalRequest
     * @param array $serviceRequest
     * @param $method
     * @return DecoratorInterface
     */
    protected function launch(DtoInterface $generalRequest, array $serviceRequest, $method)
    {
        $requester = $this->instantiateRequester($method);
        $requester->setData($serviceRequest);
        $responder = $this->instantiateResponder($method);
        $params = $this->build($requester, $generalRequest);
        $response = $this->client->request('GET', "router/rest?{$params}", $generalRequest->getHeaders(), []);
        return $responder->process($response);
    }

    /**
     * @param $method
     * @return mixed
     */
    private function instantiateRequester($method)
    {
        $instance = $this->pool->get(static::REQUEST_SERVICE_MAPPER[$method]);
        return $instance;
    }

    /**
     * @param $method
     * @return ApiResponderInterface
     */
    private function instantiateResponder($method)
    {
        /** @var ApiResponderInterface $instance */
        $instance = $this->pool->get(static::RESPONSE_SERVICE_MAPPER[$method]);
        return $instance;
    }
}
