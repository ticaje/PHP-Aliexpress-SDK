<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces;

use Ticaje\Contract\Patterns\Interfaces\Decorator\DecoratorInterface;
use Ticaje\Contract\Patterns\Interfaces\Decorator\Responder\ResponseInterface as ContractResponseInterface;

/**
 * Interface ApiResponseInterface
 * @package Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Token
 */
interface ApiResponseInterface
{
    /**
     * @param ContractResponseInterface $response
     * @return DecoratorInterface
     */
    public function process(ContractResponseInterface $response): DecoratorInterface;
}
