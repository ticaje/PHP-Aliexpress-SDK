<?php
declare(strict_types=1);

/**
 * Provider Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature;

/**
 * Interface SignatureAlgorithmInterface
 * @package Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature
 */
interface SignatureAlgorithmInterface
{
    /**
     * @param string $message
     * @param string $secret
     * @return string
     */
    public function sign(string $message, string $secret): string;
}
