<?php
declare(strict_types=1);

/**
 * Base Infra Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Builder;

/**
 * Trait ServiceRequestBuilder
 * @package Ticaje\AeSdk\Infrastructure\Builder
 */
trait ServiceRequestBuilder
{
    /**
     * @return array
     * This method is a mix between business concern and infrastructure's
     */
    private function build()
    {
        $result = [];
        $attributes = get_object_vars($this);
        array_walk($attributes, function ($value, $attribute) use (&$result) {
            $result[$this->unCamelize($attribute)] = $value;
        });
        return $result;
    }
}
