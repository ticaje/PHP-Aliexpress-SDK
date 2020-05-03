<?php
declare(strict_types=1);

/**
 * Provider Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface as DtoInterface;

interface SignerInterface
{
    /**
     * @param DtoInterface $dto
     * @param string $toSign
     * @return string
     */
    public function sign(string $toSign, DtoInterface $dto): string;
}
