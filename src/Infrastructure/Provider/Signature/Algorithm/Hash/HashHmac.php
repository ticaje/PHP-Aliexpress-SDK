<?php
declare(strict_types=1);

/**
 * Signature Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm\Hash;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\SignatureAlgorithmInterface;

/**
 * Class HashHmac
 * @package Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm\Hash
 */
class HashHmac implements SignatureAlgorithmInterface
{
    /**
     * @inheritDoc
     */
    public function sign(string $message, string $secret): string
    {
        return hash_hmac($this->algorithm, $message, $secret);
    }
}
