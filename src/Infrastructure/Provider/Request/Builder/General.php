<?php
declare(strict_types=1);

/**
 * Request Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Infrastructure\Provider\Request\Builder;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\RequestDtoInterface as DtoInterface;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Request\Builder\PublicBuilderInterface;

/**
 * Class General
 * @package Ticaje\AeSdk\Infrastructure\Provider\Request\Builder
 */
class General implements PublicBuilderInterface
{
    private $timeStamp;

    public function __construct()
    {
        $this->timeStamp = date("Y-m-d H:i:s");
    }

    /**
     * @inheritDoc
     */
    public function compile(DtoInterface $dto): string
    {
        $result = '';
        $params = $this->compileAsArray($dto);
        array_walk($params, function ($value, $key) use (&$result) {
            $result .= "{$key}=$value&";
        });
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function compileToSignature(DtoInterface $dto): string
    {
        $publicAsArray = $this->compileAsArray($dto);
        return $this->build($publicAsArray, $dto->getRequest());
    }

    /**
     * @param DtoInterface $dto
     * @return array
     */
    private function compileAsArray(DtoInterface $dto): array
    {
        return [
            'method' => $dto->getApiMethodName(),
            'app_key' => $dto->getAppKey(),
            'session' => $dto->getAccessToken(),
            'timestamp' => $this->timeStamp,
            'format' => $dto->getResponseFormat(),
            'v' => $dto->getApiVersion(),
            'sign_method' => $dto->getSignMethod(),
        ];
    }

    /**
     * @param array $public
     * @param array $request
     * @return string
     */
    private function build(array $public, array $request): string
    {
        $params = array_merge($request, $public);
        ksort($params);
        $result = '';
        array_walk($params, function ($value, $key) use (&$result) {
            $result .= $key . $value;
        });
        return $result;
    }
}
