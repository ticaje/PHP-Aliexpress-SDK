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
 * Interface ApiPostInterface
 * @package Ticaje\AeSdk\Api\Interfaces
 */
interface ApiPostInterface extends MediatorInterface, ComplexMediatorInterface
{
    /**
     * @param DtoInterface $generalRequest
     * @param array $serviceRequest
     * @return DecoratorInterface
     */
    public function post(DtoInterface $generalRequest, array $serviceRequest): DecoratorInterface;
}
