<?php
declare(strict_types=1);

/**
 * Authorization Builder Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Authorization;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Auth\AuthBuilderInterface;

/**
 * Class Builder
 * @package Ticaje\AeSdk\Infrastructure\Provider\Authorization
 */
class Builder implements AuthBuilderInterface
{
    private $responseType = 'code';

    private $state = '1212';

    private $view = 'web';

    private $sp = 'ae';

    /**
     * @param array $params
     * @return string
     * This method implements bounded business logic on infrastructure side
     */
    public function build(array $params): string
    {
        $clientId = $params['client_id'];
        $callback = $params['callback'];
        $result = "response_type={$this->responseType}&client_id={$clientId}&redirect_uri={$callback}&state={$this->state}&view={$this->view}&sp={$this->sp}";
        return $result;
    }
}
