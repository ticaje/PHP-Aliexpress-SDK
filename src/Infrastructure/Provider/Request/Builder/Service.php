<?php
declare(strict_types=1);

/**
 * Request Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Request\Builder;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\Builder\ServiceBuilderInterface;

/**
 * Class Service
 * @package Ticaje\AeSdk\Infrastructure\Provider\Request\Builder
 */
class Service implements ServiceBuilderInterface
{
    /**
     * @inheritDoc
     * Specific business logic
     */
    public function compile(array $request = []): string
    {
        $result = '';
        array_walk($request, function ($value, $key) use (&$result) {
            $result .= "{$key}=$value&"; // Exact business policy
        });
        return $result;
    }
}
