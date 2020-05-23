<?php
declare(strict_types=1);

/**
 * Request Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Domain\Endpoint\Solution\Promise\Template;

use Ticaje\Contract\Patterns\Interfaces\Pool\WorkerInterface;
use Ticaje\Contract\Traits\BaseDto;

use Ticaje\AeSdk\Infrastructure\Builder\ServiceRequestBuilder;
use Ticaje\AeSdk\Domain\Interfaces\Request\ServiceRequestInterface;

/**
 * Class Get
 * @package Ticaje\AeSdk\Domain\Endpoint\Solution\Freight\Template
 * @todo Still to define AE API, not sure we got the right one
 */
class Get implements ServiceRequestInterface, WorkerInterface
{
    use BaseDto, ServiceRequestBuilder;

    private $apiMethodName = 'aliexpress.postproduct.redefining.querypromisetemplatebyid';

    private $templateId = '-1';
    /**
     * @inheritDoc
     * Empty request since contains no params according to AE policies
     */
    public function getRequest(): array
    {
        $result = ['param0' => json_encode($this->build())];
        return $result;
    }
}
