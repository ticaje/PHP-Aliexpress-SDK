<?php
declare(strict_types=1);

/**
 * Signature Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm\Hash;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\ComplexAlgorithmInterface;

/**
 * Class HashHmac
 * @package Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm\Hash
 */
class HashHmac implements ComplexAlgorithmInterface
{
    protected $algorithm;

    /**
     * HashHmac constructor.
     * @param string $algorithm
     */
    public function __construct(
        string $algorithm = 'md5'
    ) {
        $this->algorithm = $algorithm;
    }

    /**
     * @inheritDoc
     */
    public function sign(string $message, string $secret): string
    {
        return hash_hmac($this->algorithm, $message, $secret);
    }
}
