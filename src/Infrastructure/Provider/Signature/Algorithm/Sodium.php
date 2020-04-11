<?php
declare(strict_types=1);

/**
 * Signature Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\SignatureAlgorithmInterface;

/**
 * Class Sodium
 * @package Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm
 * This class provides sodium implementation to signing message, could be abstracted into
 * an agnostic base class for reusing by other modules
 */
class Sodium implements SignatureAlgorithmInterface
{
    /**
     * @inheritDoc
     * Not necessarily to pass an algorithm since sodium uses other specific constraints to perform a signing
     */
    public function sign(string $message, string $secret): string
    {
        return sodium_crypto_sign($message, $secret);
    }
}
