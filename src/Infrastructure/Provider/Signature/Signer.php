<?php
declare(strict_types=1);

/**
 * Signature Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Signature;

use Ticaje\Contract\Patterns\Interfaces\Dto\DtoInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\SignatureAlgorithmInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\SignatureBuilderInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\SignerInterface;

/**
 * Class Signer
 * @package Ticaje\AeSdk\Infrastructure\Provider\Signature
 */
class Signer implements SignerInterface
{
    private $builder;

    private $algorithm;

    public function __construct(
        SignatureBuilderInterface $builder,
        SignatureAlgorithmInterface $algorithm
    ) {
        $this->builder = $builder;
        $this->algorithm = $algorithm;
    }

    /**
     * @inheritDoc
     */
    public function sign(DtoInterface $dto): string
    {
        $result = $this->algorithm->sign($this->perform($dto), $dto->getSecret());
        return $result;
    }

    /**
     * @param $dto
     * @return string
     * This method accomplishes business policy
     */
    private function perform($dto)
    {
        $sorted = $this->builder->build($dto);
        $secret = $dto->getSecret();
        $data = $this->policy($secret, $sorted);
        return $data;
    }

    /**
     * @param $secret
     * @param $data
     * @return string
     * This is the business policy being met
     */
    private function policy($secret, $data)
    {
        return $secret . $data . $secret;
    }
}
