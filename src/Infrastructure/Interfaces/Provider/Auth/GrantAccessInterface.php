<?php
declare(strict_types=1);

/**
 * Provider Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Auth;

/**
 * Interface GrantAccessInterface
 * @package Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Auth
 */
interface GrantAccessInterface
{
    /**
     * @param array $params
     * @return string
     */
    public function getAuthUrl(array $params): string;
}
