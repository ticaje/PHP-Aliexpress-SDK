<?php
declare(strict_types=1);

/**
 * Provider Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request;

use Ticaje\Contract\Patterns\Interfaces\Decorator\RequesterInterface as ParentInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;

/**
 * Interface RequesterInterface
 * @package Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request
 * This module orchestrate a AE API request in order to send data compliant with its policies.
 */
interface RequesterInterface extends ParentInterface
{
    /**
     * @param RequestDtoInterface $dto
     * @return string
     * This method returns the request AE's API compliant
     */
    public function compile(RequestDtoInterface $dto): string;
}
