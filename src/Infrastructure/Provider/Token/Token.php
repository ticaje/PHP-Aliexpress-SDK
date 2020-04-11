<?php
declare(strict_types=1);

/**
 * Token Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Token;

use Ticaje\Connector\Gateway\Provider\Token\Token as ParentClass;
use Ticaje\Connector\Interfaces\Provider\Token\TokenProviderInterface as ParentInterface;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Token\TokenProviderInterface;

/**
 * Class Token
 * @package Ticaje\AeSdk\Infrastructure\Provider\Token
 * This is a specific implementation of a token provider suited to AE needs
 * This class can be used as a standalone service since it follows a Service Isolation pattern
 */
class Token extends ParentClass implements TokenProviderInterface
{
    /**
     * @inheritDoc
     * It is the responsibility of consumer to pass through AE compliant params
     */
    public function setParams(array $params): ParentInterface
    {
        return parent::setParams($this->buildRequest($params));
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
