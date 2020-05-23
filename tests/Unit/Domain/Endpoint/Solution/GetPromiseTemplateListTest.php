<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Promise\Template\Get;
use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;

/**
 * Class GetPromiseTemplateListTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class GetPromiseTemplateListTest extends ParentClass
{
    protected $class = Get::class;

    protected $apiMethodName = 'aliexpress.postproduct.redefining.querypromisetemplatebyid';

    protected $params = ['template_id'];

    protected $paramKey = 'param0';
}
