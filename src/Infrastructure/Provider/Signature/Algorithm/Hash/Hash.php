<?php
declare(strict_types=1);

/**
 * Signature Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm\Hash;

/**
 * Class Hash
 * @package Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm\Hash
 */
class Hash extends Base
{
    /**
     * @inheritDoc
     * A little I.S.P issue since no needed secret for this algorithm
     */
    public function sign(string $message, string $secret): string
    {
        return hash($this->algorithm, $message);
    }
}
