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
 * Success method is implemented on a case by case basis since AE responses follow this approach.
 */
trait Responder
{
    use BaseDto;

    private $success;

    private $message;

    private $code;

    /**
     * @param \stdClass $response
     */
    protected function error(\stdClass $response)
    {
        $this
            ->setSuccess(0)
            ->setContent(null)
            ->setCode($response->code)
            ->setMessage($response->msg)
        ;
    }
}
