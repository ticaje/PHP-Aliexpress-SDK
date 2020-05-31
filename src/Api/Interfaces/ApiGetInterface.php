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
 * Interface ApiGetInterface
 * @package Ticaje\AeSdk\Api\Interfaces
 */
interface ApiGetInterface extends MediatorInterface
{
    /**
     * @param DtoInterface $generalRequest
     * @param array $serviceRequest
     * @return DecoratorInterface
     */
    public function list(DtoInterface $generalRequest, array $serviceRequest): DecoratorInterface;

    /**
     * @param DtoInterface $generalRequest
     * @param array $serviceRequest
     * @return DecoratorInterface
     */
    public function get(DtoInterface $generalRequest, array $serviceRequest): DecoratorInterface;

    /**
     * @param DtoInterface $generalRequest
     * @param array $serviceRequest
     * @return DecoratorInterface
     */
    public function info(DtoInterface $generalRequest, array $serviceRequest): DecoratorInterface;
}
