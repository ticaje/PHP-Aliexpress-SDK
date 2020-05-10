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
        $serviceRequestInstance = $this->pool->get(self::REQUEST_SERVICE_MAPPER[$method]);
        $serviceRequestInstance->setData($serviceRequest);
        /** @var ApiResponderInterface $responder */
        $responder = $this->pool->get(self::RESPONSE_SERVICE_MAPPER[$method]);
        $params = $this->build($serviceRequestInstance, $generalRequest);
        $response = $this->client->request('GET', "router/rest?{$params}", $generalRequest->getHeaders(), []);
        return $responder->process($response);
    }
}
