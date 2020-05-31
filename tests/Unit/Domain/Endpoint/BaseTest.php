<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint;

use Ticaje\AeSdk\Test\Unit\BaseTest as ParentClass;

use Ticaje\AeSdk\Domain\Interfaces\Request\ServiceRequestInterface;

/**
 * Class BaseTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint
 */
abstract class BaseTest extends ParentClass
{
    protected $instance;

    protected $class;

    protected $paramKey = null;

    protected $apiMethodName;

    protected $params = [];

    protected $endPointer;

    public function setUp()
    {
        $this->instance = new $this->class();
    }

    public function testProperInterface()
    {
        $this->assertInstanceOf(ServiceRequestInterface::class, $this->instance);
    }

    public function testGetRequestReturnsEmptyArray()
    {
        $request = $this->instance->getRequest();
        $this->assertInternalType('array', $request, 'Expects proper key');
    }

    public function testGetApiMethodName()
    {
        $this->assertEquals($this->apiMethodName, $this->instance->getApiMethodName(), 'Expects to return proper api method name');
    }

    public function testProperParams()
    {
        if (!$this->paramKey()) {
            $this->assertTrue(true);
        } else {
            $request = json_decode($this->instance->getRequest()[$this->paramKey], true);
            foreach ($this->params as $param) {
                $this->assertArrayHasKey($param, $request);
            }
        }
    }

    private function paramKey()
    {
        return !is_null($this->paramKey);
    }
}
