<?php
declare(strict_types=1);

/**
 * Token Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Token;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Token\TokenResponderInterface;
use Ticaje\Contract\Patterns\Interfaces\Decorator\Responder\ResponseInterface as ContractResponseInterface;
use Ticaje\Contract\Traits\BaseDto;

/**
 * Class TokenDecorator
 * @package Ticaje\AeSdk\Infrastructure\Provider\Token
 * This is a high level module hence a specific implementation, you can notice specific constraints when it comes to
 * handle data coming from AE API.
 */
class TokenDecorator implements TokenResponderInterface
{
    use BaseDto;

    private $success;

    private $accessToken;

    private $accessTokenValidity;

    private $message;

    /**
     * @inheritDoc
     */
    public function process(ContractResponseInterface $response): TokenResponderInterface
    {
        $content = $response->getContent();
        // This is actually the business policy behind this class
        isset($content->access_token) ? $this->launchSuccess($content) : $this->launchFailed($content);
        return $this;
    }

    /**
     * @param $content
     */
    private function launchSuccess($content)
    {
        $this->setSuccess(true);
        $this->setAccessToken($content->access_token);
        $this->setAccessTokenValidity($content->expire_time);
        $this->setMessage("Token generated successfully");
    }

    /**
     * @param $content
     */
    private function launchFailed($content)
    {
        $this->setSuccess(false);
        $this->setMessage("There was a problem generating token: {$content->error_msg}");
    }
}
