<?php
declare(strict_types=1);

/**
 * Signature Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Signature;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\SignatureInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface as DtoInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\SignerInterface;

/**
 * Class Signer
 * @package Ticaje\AeSdk\Infrastructure\Provider\Signature
 */
class Signer implements SignerInterface
{
    private $algorithmer;

    public function __construct(
        SignatureInterface $algorithmer
    ) {
        $this->algorithmer = $algorithmer;
    }

    /**
     * @inheritDoc
     */
    public function sign(string $toSign, DtoInterface $dto): string
    {
        $secret = $dto->getSecret();
        $result = strtoupper($this->algorithmer->sign($this->perform($toSign, $secret)));
        return $result;
    }

    /**
     * @param string $sorted
     * @param string $secret
     * @return string
     * This method accomplishes business policy
     */
    private function perform(string $sorted, string $secret)
    {
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
