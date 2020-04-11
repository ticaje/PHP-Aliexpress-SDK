<?php
declare(strict_types=1);

/**
 * Base Infra Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Base\Traits;

/**
 * Trait Utils
 * @package Ticaje\AeSdk\Base\Traits
 */
trait Utils
{
    /**
     * @param $string
     * @param string $separator
     * @return string
     * This method converts a string into camelCase
     * The main constraint: the properties of a class using this trait must be compliant with the following pattern
     * (^[a-z]|[A-Z0-9])[a-z]*
     */
    public function camelize($string, $separator = '_')
    {
        return lcfirst(
            array_reduce(
                explode($separator, strtolower($string)),
                function ($carry, $value) {
                    $carry .= ucfirst($value);
                    return $carry;
                },
                ''
            )
        );
    }
}
