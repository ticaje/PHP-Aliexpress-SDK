<?php
declare(strict_types=1);

/**
 * Request Provider Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Domain\Endpoint\Solution\Seller\Category\Tree;

use Ticaje\Contract\Patterns\Interfaces\Pool\WorkerInterface;
use Ticaje\Contract\Traits\BaseDto;
use Ticaje\AeSdk\Infrastructure\Builder\ServiceRequestBuilder;
use Ticaje\AeSdk\Domain\Interfaces\Request\ServiceRequestInterface;

/**
 * Class Get
 * @package Ticaje\AeSdk\Domain\Endpoint\Solution\Seller\Category\Tree
 */
class Get implements ServiceRequestInterface, WorkerInterface
{
    use BaseDto, ServiceRequestBuilder;

    private $apiMethodName = 'aliexpress.solution.seller.category.tree.query';

    private $categoryId = 509;

    private $filterNoPermission = true;

    public function getRequest(): array
    {
        $this->filterLogic();
        $request = $this->build();
        return $request;
    }

    private function filterLogic()
    {
        $this->filterNoPermission = (!is_bool($this->filterNoPermission) ? $this->filterNoPermission : ($this->filterNoPermission ? 'true' : 'false'));
    }
}
