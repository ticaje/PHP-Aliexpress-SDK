<?php
declare(strict_types=1);

/**
 * Responder Trait
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Api\Artifact\Responder;

use Ticaje\Contract\Traits\BaseDto;

/**
 * Trait Responder
 * @package Ticaje\AeSdk\Api\Artifact\Responder
 */
trait Responder
{
    use BaseDto;

    private $success;

    private $message;

    private $code;
}
