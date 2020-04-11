<?php
declare(strict_types=1);

/**
 * Token Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Token;

use Ticaje\AConnector\Interfaces\Provider\Token\TokenProviderInterface as MiddlewareTokenProviderInterface;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Token\TokenProviderInterface;

/**
 * Class Token
 * @package Ticaje\AeSdk\Infrastructure\Provider\Token
 * This is a specific implementation of a token provider suited to AE needs.
 * This class can be used as a standalone service since it follows a Service Isolation pattern
 * The only condition to this is using a Dependency Container or some artifact that orchestrates the
 * bootstrapping of the dependency tree to high level modules using this lower level module.
 * This is fully compliant with Dependency Inversion principle.
 */
class Token implements TokenProviderInterface
{
    /** @var MiddlewareTokenProviderInterface $middleWare */
    private $middleWare;

    /**
     * Token constructor.
     * @param MiddlewareTokenProviderInterface $middleWare
     * We're gonna use anymore a framework coupled dependency as so far, Ticaje\Connector is a Magento based extension
     * this library is relying on right now, this is inconsistent with agnostic approach.
     * From now on Ticaje\Connector is gonna be a framework independent library, so the glue amongst libraries will be defined
     * in the light of a DC container or similar artifact.
     */
    public function __construct(
        MiddlewareTokenProviderInterface $middleWare
    ) {
        $this->middleWare = $middleWare;
    }

    /**
     * @inheritDoc
     * It is the responsibility of consumer to pass through AE compliant params
     */
    public function setParams(array $params): MiddlewareTokenProviderInterface
    {
        return $this->middleWare->setParams($this->buildRequest($params));
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->middleWare->getAccessToken();
    }

    /**
     * @param $params
     * @return array
     * This should be abstracted away into a builder/dto class
     * Anyway, this is not so bad since it's compliant with AE business constraints
     */
    private function buildRequest($params)
    {
        $result = [
            'code' => $params['code'],
            'grant_type' => 'authorization_code',
            'client_id' => $params['client_id'],
            'client_secret' => $params['client_secret'],
            'sp' => 'ae',
            'redirect_url' => $params['callback_url']
        ];
        return $result;
    }
}
