<?php
declare(strict_types=1);

/**
 * Request Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Request;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\Builder\PublicBuilderInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\Builder\ServiceBuilderInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequesterInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\SignerInterface;

/**
 * Class Requester
 * @package Ticaje\AeSdk\Infrastructure\Provider\Request
 * This class is responsible for compiling the whole request to AE API.
 * It contains complies with to components of AE communication constraints: Public and Service parameters
 */
class Requester implements RequesterInterface
{
    private $signer;

    private $publicBuilder;

    private $serviceBuilder;

    /**
     * Requester constructor.
     * @param SignerInterface $signer
     * @param PublicBuilderInterface $publicBuilder
     * @param ServiceBuilderInterface $serviceBuilder
     */
    public function __construct(
        SignerInterface $signer,
        PublicBuilderInterface $publicBuilder,
        ServiceBuilderInterface $serviceBuilder
    ) {
        $this->signer = $signer;
        $this->publicBuilder = $publicBuilder;
        $this->serviceBuilder = $serviceBuilder;
    }

    /**
     * @inheritDoc
     */
    public function compile(RequestDtoInterface $dto): string
    {
        $public = $this->compilePublic($dto);
        $service = $this->compileService($dto);
        $signature = $this->compileSignature($dto);
        return "{$public}{$service}{$signature}";
    }

    /**
     * @param $dto
     * @return string
     */
    private function compilePublic($dto)
    {
        return $this->publicBuilder->compile($dto);
    }

    /**
     * @param $dto
     * @return string
     */
    private function compileSignature($dto)
    {
        $sortedForSigning = $this->publicBuilder->compileToSignature($dto);
        $signature = $this->signer->sign($sortedForSigning, $dto);
        return "sign={$signature}";
    }

    /**
     * @param $dto
     * @return string
     */
    private function compileService($dto)
    {
        $request = $dto->getRequest();
        return $this->serviceBuilder->compile($request);
    }
}
