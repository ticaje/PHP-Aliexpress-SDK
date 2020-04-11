<?php
declare(strict_types=1);

/**
 * Authorization Builder Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Signature;

use Ticaje\AeSdk\Infrastructure\Interfaces\DtoInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\SignatureBuilderInterface;

/**
 * Class Builder
 * @package Ticaje\AeSdk\Infrastructure\Provider\Signature
 */
class Builder implements SignatureBuilderInterface
{
    /**
     * @inheritDoc
     */
    public function build(DtoInterface $dto): string
    {
        $params = array_merge($this->compileRequestParameters($dto), $this->compilePublicParameters($dto));
        ksort($params);
        $result = '';
        array_walk($params, function ($value, $key) use (&$result) {
            $result .= $key . $value;
        });
        return $result;
    }

    private function compileRequestParameters(DtoInterface $dto)
    {
        $result = $dto->getRequest();
        return $result;
    }

    private function compilePublicParameters(DtoInterface $dto)
    {
        $result = [
            'method' => $dto->getApiMethodName(),
            'app_key' => $dto->getAppKey(),
            'session' => $dto->getAccessToken(),
            'timestamp' => time(),
            'format' => $dto->getResponseFormat(),
            'v' => $dto->getApiVersion(),
            'sign_method' => $dto->getSignMethod(),
        ];
        return $result;
    }
}
