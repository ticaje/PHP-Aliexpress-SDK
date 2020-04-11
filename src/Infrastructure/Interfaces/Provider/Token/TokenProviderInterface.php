<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Token;

use Ticaje\AConnector\Interfaces\Provider\Token\TokenProviderInterface as MiddlewareTokenProviderInterface;

/**
 * Interface TokenProviderInterface
 * @package Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Token
 */
interface TokenProviderInterface extends MiddlewareTokenProviderInterface
{
}
