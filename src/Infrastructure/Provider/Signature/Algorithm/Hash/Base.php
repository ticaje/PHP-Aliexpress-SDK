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
 * Class Base
 * @package Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm\Hash
 */
abstract class Base implements SignatureAlgorithmInterface
{
    protected $algorithm;

    /**
     * Base constructor.
     * @param string $algorithm
     */
    public function __construct(
        string $algorithm
    )
    {
        $this->algorithm = $algorithm;
    }

    /**
     * @inheritDoc
     */
    abstract public function sign(string $message, string $secret): string;
}
