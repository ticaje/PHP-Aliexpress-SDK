<?php
declare(strict_types=1);

/**
 * Signature Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm\Hash;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\Algorithm\Md5AlgorithmInterface;

/**
 * Class Hash
 * @package Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm\Hash
 */
class Md5 implements Md5AlgorithmInterface
{
    /**
     * @inheritDoc
     * A little I.S.P issue since no needed secret for this algorithm
     */
    public function sign(string $message): string
    {
        return md5($message);
    }
}
