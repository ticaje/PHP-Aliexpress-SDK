<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder;

use PHPUnit\Framework\TestCase as ParentClass;
use Error;

use Ticaje\AeSdk\Api\Interfaces\ApiResponderInterface;
use Ticaje\Contract\Patterns\Implementation\Decorator\Responder\Response;

/**
 * Class BaseTest
 * @package Ticaje\AeSdk\Test\Unit\Api\Artifact\Responder
 */
abstract class BaseTest extends ParentClass
{
    protected $instance;

    protected $class;

    protected $attributes;

    public function setUp()
    {
        $this->instance = new $this->class();
    }

    public function testProperInterface()
    {
        $this->assertInstanceOf(ApiResponderInterface::class, $this->instance);
    }

    public function testDefaultAttributes()
    {
        $this->assertObjectHasAttribute('success', $this->instance, 'Assert it has success attribute');
        $this->assertObjectHasAttribute('message', $this->instance, 'Assert it has message attribute');
        $this->assertObjectHasAttribute('code', $this->instance, 'Assert it has code attribute');
    }

    public function testBadArgumentsWhenProcessMethodCalled()
    {
        $this->expectException(Error::class);
        $this->assertInstanceOf(ApiResponderInterface::class, $this->instance->process(5), 'Assert it returns proper interface');
    }

    public function testProcessMethodCalled()
    {
        $mockedInstance = $this->getMockBuilder($this->class)->getMock();
        $response = new Response();
        $response->setContent(
            '{
                "error_response":{
                    "sub_msg":"非法参数",
                    "code":50,
                    "sub_code":"isv.invalid-parameter",
                    "msg":"Remote service error"
                }
            }'
        );

        ($assertProcessMethodInstanceOf = function () use ($response, $mockedInstance) {
            $mockedInstance->method('process')->willReturn($mockedInstance);
            $this->assertInstanceOf(ApiResponderInterface::class, $mockedInstance->process($response), 'Assert it passes proper interface when invoking process method');
        })();

        ($assertProcessMethodWithFailedResponse = function () use ($response, $mockedInstance) {
            $mockedInstance->method('process')->willReturn($mockedInstance);
            $this->assertInstanceOf(ApiResponderInterface::class, $mockedInstance->process($response), 'Assert it passes proper interface when invoking process method');
            $this->instance->process($response);
            $this->assertEquals(0, $this->instance->getSuccess(), 'Assert success is 0');
            $this->assertEquals(50, $this->instance->getCode(), 'Assert code is 50');
            $this->assertEquals(null, $this->instance->getContent(), 'Assert no content when error');
            $this->assertContains('Remote service error', $this->instance->getMessage(), 'Assert message is the right one');
        })();
    }

    /**
     * @param $callable
     * @param $responderContainer
     */
    public function launchSuccessResponse(callable $callable, $responderContainer)
    {
        ($initializer = function () use (&$response, &$mockedInstance, $responderContainer) {
            $response = new Response();
            $mockedInstance = $this->getMockBuilder($this->class)->getMock();
            $mockedInstance->method('process')->willReturn($mockedInstance);
            $response->setContent($responderContainer->getContent());
            $this->instance->process($response);
        })();

        ($assertStandards = function () use ($response, $mockedInstance) {
            $this->assertEquals(1, $this->instance->getSuccess(), 'Assert success is 1');
            $this->assertEquals(200, $this->instance->getCode(), 'Assert code is 200');
            $this->assertContains('successfully', $this->instance->getMessage(), 'Assert message is the right one');
        })();

        $callable();
    }
}
