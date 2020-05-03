<?php
declare(strict_types=1);

/**
 * Provider Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\Builder;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface as DtoInterface;

/**
 * Interface PublicBuilderInterface
 * @package Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\Builder
 */
interface PublicBuilderInterface
{
    /**
     * @param DtoInterface $data
     * @return string
     */
    public function compile(DtoInterface $data): string;

    /**
     * @param DtoInterface $data
     * @return string
     */
    public function compileToSignature(DtoInterface $data): string ;
}
