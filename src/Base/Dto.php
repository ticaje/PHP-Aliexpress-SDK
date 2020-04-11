<?php
declare(strict_types=1);

/**
 * Base Dto Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Base;

use Ticaje\AeSdk\Base\Traits\BaseDto;
use Ticaje\AeSdk\Infrastructure\Interfaces\DtoInterface;

/**
 * Class Dto
 * @package Ticaje\AeSdk\Base
 */
class Dto implements DtoInterface
{
    use BaseDto;
}
