<?php
declare(strict_types=1);

/**
 * Provider Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature;

/**
 * Interface SimpleAlgorithmInterface
 * @package Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature
 */
interface SimpleAlgorithmInterface extends SignatureInterface
{
    /**
     * @param string $message
     * @return string
     */
    public function sign(string $message): string;
}
