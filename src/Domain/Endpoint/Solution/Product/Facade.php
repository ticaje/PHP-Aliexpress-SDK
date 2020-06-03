<?php
declare(strict_types=1);

/**
 * Base Infra Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Domain\Endpoint\Solution\Product;

/**
 * Trait Facade
 * @package Ticaje\AeSdk\Domain\Endpoint\Solution\Product
 */
trait Facade
{
    public function getRequest(): array
    {
        $sanitized = $this->sanitize();
        $result = $sanitized ? [$this->getParamsKey() => $sanitized] : [];
        return $result;
    }

    /**
     * @return array|null
     * We have allowed ourselves to comply with a small business constraint since normal product post demands it.
     * It would be fine to enforce that product post interface wrapping key is passed along properly. UT to the rescue...
     */
    private function sanitize()
    {
        $built = $this->build();
        $clean = $built[self::PARAMS_WRAPPER_KEY] ?? null;
        return $clean;
    }

    public function getParamsWrapperKey(): string
    {
        return 'params';
    }
}
