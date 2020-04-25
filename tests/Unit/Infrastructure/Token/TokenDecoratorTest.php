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
        ($mockAeResponse = function () use (&$responseEncoded) {
            $responseEncoded = json_encode(["error_msg" => "Error Papi"]);
        })();

        ($mockSdkResponseDecorator = function () use (&$responseEncoded, &$response) {
            $response = new Response();
            $response->setContent($responseEncoded);
        })();

        /** This method makes sure that a success response must have error_msg attribute */
        ($assertBusinessPolicyPreconditions = function () use ($responseEncoded) {
            $decoded = json_decode($responseEncoded);
            $this->assertObjectHasAttribute('error_msg', $decoded, 'Check that key "error_msg" exists when returning bad token response');
        })();

        /** This method check response decorator result has all proper attributes to be used by consumers */
        ($assertProcessResponse = function () use ($response) {
            $decorator = new TokenDecorator();
            $tokenDecorator = $decorator->process($response);
            $this->assertRegExp('/There was a problem .* Error Papi/', $tokenDecorator->getMessage());
            $this->assertFalse($tokenDecorator->getSuccess(), 'Assert responder returns false when bad response from SDK');
        })();
    }

    public function testSuccessResponse()
    {
        ($mockAeResponse = function () use (&$responseEncoded, &$token, &$tokenExpirationDate) {
            $token = '3464656546456456';
            $tokenExpirationDate = date("Y-m-d", strtotime("+1 months"));
            $responseEncoded = json_encode(["access_token" => $token, "expire_time" => $tokenExpirationDate]);
        })();

        ($mockSdkResponseDecorator = function () use (&$responseEncoded, &$response) {
            $response = new Response();
            $response->setContent($responseEncoded);
        })();

        /** This method makes sure that a success response must have access_token and expire_time attributes */
        ($assertBusinessPolicyPreconditions = function () use ($responseEncoded) {
            $decoded = json_decode($responseEncoded);
            $this->assertObjectHasAttribute('access_token', $decoded, 'Check that key "access_token" must exist when returning success token response');
            $this->assertObjectHasAttribute('expire_time', $decoded, 'Check that key "expire_time" must exist when returning success token response');
        })();

        /** This method check response decorator result has all proper attributes to be used by consumers */
        ($assertProcessResponse = function () use ($response, $token, $tokenExpirationDate) {
            $decorator = new TokenDecorator();
            $tokenDecorator = $decorator->process($response);
            $this->assertContains('Token generated successfully', $tokenDecorator->getMessage());
            $this->assertTrue($tokenDecorator->getSuccess(), 'Assert responder returns true when success response from SDK');
            $this->assertNotEmpty($tokenDecorator->getAccessToken(), 'Assert responder returns access token when success response from SDK');
            $this->assertNotEmpty($tokenDecorator->getAccessTokenValidity(), 'Assert responder returns access token validity when success response from SDK');
            $this->assertEquals($tokenDecorator->getAccessToken(), $token);
            $this->assertEquals($tokenDecorator->getAccessTokenValidity(), $tokenExpirationDate);
        })();
    }
}
