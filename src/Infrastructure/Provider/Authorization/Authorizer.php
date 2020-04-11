<?php
declare(strict_types=1);

/**
 * Authorization Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Authorization;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Auth\AuthBuilderInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Auth\GrantAccessInterface;

/**
 * Class Authorizer
 * @package Ticaje\AeSdk\Infrastructure\Provider\Authorization
 */
class Authorizer implements GrantAccessInterface
{
    private $builder;

    private $baseUri;

    /**
     * Authorizer constructor.
     * @param AuthBuilderInterface $builder
     * @param string $baseUri
     */
    public function __construct(
        AuthBuilderInterface $builder,
        string $baseUri
    ) {
        $this->baseUri = $baseUri;
        $this->builder = $builder;
    }

    /**
     * @inheritDoc
     * This is a full business constraint
     */
    public function getAuthUrl(array $params): string
    {
        $queryString = $this->builder->build($params);
        $result = "{$this->baseUri}?{$queryString}";
        return $result;
    }
}
