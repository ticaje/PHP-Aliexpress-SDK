<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Infrastructure\Authenticator;

use Error;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Token\TokenResponderInterface;
use Ticaje\AeSdk\Test\Unit\BaseTest as ParentClass;

use Ticaje\AeSdk\Infrastructure\Provider\Token\TokenDecorator;
use Ticaje\Contract\Patterns\Implementation\Decorator\Responder\Response;

/**
 * Class TokenDecoratorTest
 * @package Ticaje\AeSdk\Test\Unit\Infrastructure\Authenticator
 */
class TokenDecoratorTest extends ParentClass
{
    private $decorator;

    public function setUp()
    {
        $this->decorator = $this->getMockBuilder(TokenDecorator::class)
            ->getMock();
    }

    public function testProperInterface()
    {
        $this->assertInstanceOf(TokenResponderInterface::class, $this->decorator);
    }

    public function testProcessRaisesExceptionPassingNull()
    {
        $this->expectException(Error::class);
        $this->assertTrue($this->decorator->process());
    }

    public function testProcessRaisesExceptionArray()
    {
        $this->expectException(Error::class);
        $this->assertTrue($this->decorator->process([1,2,3]));
    }

    public function testProcess()
    {
        $this->decorator->method('process')
            ->willReturn($this->decorator);
        $response = new Response();
        $tokenDecorator = $this->decorator->process($response);
        $this->assertEquals($this->decorator, $tokenDecorator);
    }

    public function testFailedResponse()
    {
        $response = new Response();
        $decorator = new TokenDecorator();

        $closureKeys  = function () use ($response) {
            $content = json_decode(json_encode(["error_msg" => "Error Papi"]), false);
            $response->setContent($content);
            $this->assertObjectHasAttribute('error_msg', $content, 'Check that key "error_msg" exists when returning bad token response');
        };
        $closureKeys();

        $closureLogic = function () use ($response, $decorator) {
            $tokenDecorator = $decorator->process($response);
            $this->assertContains('There was a problem', $tokenDecorator->getMessage());
            $this->assertFalse($tokenDecorator->getSuccess(), 'Assert responder returns false when bad response from SDK');
        };
        $closureLogic();
    }

    public function testSuccessResponse()
    {
        $response = new Response();
        $decorator = new TokenDecorator();

        $token = '3464656546456456';
        $tokenExpirationDate = date("Y-m-d", strtotime("+1 months"));
        $closureKeys  = function () use ($response, $token, $tokenExpirationDate) {
            $content = json_decode(json_encode(["access_token" => $token, "expire_time" => $tokenExpirationDate]), false);
            $response->setContent($content);
            $this->assertObjectHasAttribute('access_token', $content, 'Check that key "access_token" must exist when returning success token response');
            $this->assertObjectHasAttribute('expire_time', $content, 'Check that key "expire_time" must exist when returning success token response');
        };
        $closureKeys();

        $closureLogic = function () use ($response, $decorator, $token, $tokenExpirationDate) {
            $tokenDecorator = $decorator->process($response);
            $this->assertContains('Token generated successfully', $tokenDecorator->getMessage());
            $this->assertTrue($tokenDecorator->getSuccess(), 'Assert responder returns true when success response from SDK');
            $this->assertNotEmpty($tokenDecorator->getAccessToken(), 'Assert responder returns access token when success response from SDK');
            $this->assertNotEmpty($tokenDecorator->getAccessTokenValidity(), 'Assert responder returns access token validity when success response from SDK');
            $this->assertEquals($tokenDecorator->getAccessToken(), $token);
            $this->assertEquals($tokenDecorator->getAccessTokenValidity(), $tokenExpirationDate);
        };
        $closureLogic();
    }
}
