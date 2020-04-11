<?php
declare(strict_types=1);

/**
 * Provider Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Auth;

/**
 * Interface AuthBuilderInterface
 * @package Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Auth
 */
interface AuthBuilderInterface
{
    /**
     * @param array $params
     * @return string
     */
    public function build(array $params): string;
}
