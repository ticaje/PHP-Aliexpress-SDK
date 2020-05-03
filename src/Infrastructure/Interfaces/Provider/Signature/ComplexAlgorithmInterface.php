<?php
declare(strict_types=1);

/**
 * Provider Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature;

/**
 * Interface ComplexAlgorithmInterface
 * @package Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature
 */
interface ComplexAlgorithmInterface extends SignatureInterface
{
    /**
     * @param string $message
     * @param string $secret
     * @return string
     */
    public function sign(string $message, string $secret): string;
}
