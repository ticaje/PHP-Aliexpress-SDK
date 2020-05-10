<?php
declare(strict_types=1);

/**
 * Base Dto Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Request;

use Ticaje\Contract\Traits\BaseDto;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;

/**
 * Class GeneralRequestDto
 * @package Ticaje\AeSdk\Infrastructure\Provider\Request
 */
class ServiceRequestDto implements RequestDtoInterface
{
    use BaseDto;
}
