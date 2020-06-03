<?php
declare(strict_types=1);

/**
 * General Interface
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Interfaces;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface as DtoInterface;
use Ticaje\Contract\Patterns\Interfaces\Decorator\DecoratorInterface;

/**
 * Interface ApiDeleteInterface
 * @package Ticaje\AeSdk\Api\Interfaces
 */
interface ApiDeleteInterface extends MediatorInterface
{
    /**
     * @param DtoInterface $generalRequest
     * @param array $serviceRequest
     * @return DecoratorInterface
     */
    public function delete(DtoInterface $generalRequest, array $serviceRequest): DecoratorInterface;
}
