<?php
declare(strict_types=1);

/**
 * Api Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Mediator;

use Ticaje\Contract\Patterns\Interfaces\Pool\PoolInterface;

use Ticaje\AConnector\Interfaces\ClientInterface;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequesterInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\DtoInterface;

use Ticaje\AeSdk\Domain\Interfaces\Request\ServiceRequestInterface;

/**
 * Class Base
 * @package Ticaje\AeSdk\Api\Mediator
 */
abstract class Base
{
    private $baseUri = 'http://gw.api.taobao.com/';

    protected $client;

    protected $requester;

    protected $pool;

    public function __construct(
        ClientInterface $client,
        RequesterInterface $requester,
        PoolInterface $pool
    ) {
        $this->client = $client;
        $this->requester = $requester;
        $this->pool = $pool;
        $this->client->generateClient(['base_uri' => $this->baseUri]);
    }

    public function build(ServiceRequestInterface $serviceRequest, DtoInterface $dto)
    {
        $dto->setApiMethodName($serviceRequest->getApiMethodName());
        $dto->setRequest($serviceRequest->getRequest());
        $params = $this->requester->compile($dto);
        return $params;
    }
}
