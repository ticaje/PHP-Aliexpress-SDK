<?php
declare(strict_types=1);

/**
 * API Request Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Domain\Interfaces\Request;

/**
 * Interface ProductSendingInterface
 * @package Ticaje\AeSdk\Domain\Interfaces\Request
 */
interface ProductSendingInterface
{
    const PARAMS_WRAPPER_KEY = 'params';

    public function getParamsWrapperKey(): string;
}
