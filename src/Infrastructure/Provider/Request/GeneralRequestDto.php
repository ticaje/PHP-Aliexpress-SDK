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
class GeneralRequestDto implements RequestDtoInterface
{
    use BaseDto;

    private $apiVersion = '2.0';

    private $signMethod = 'md5';

    private $responseFormat = 'json';
}
