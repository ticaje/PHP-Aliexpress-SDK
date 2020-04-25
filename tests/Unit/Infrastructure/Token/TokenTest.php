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

use Ticaje\AConnector\Gateway\Client\Rest;
use Ticaje\AConnector\Interfaces\Provider\Token\TokenProviderInterface;
use Ticaje\AConnector\Gateway\Provider\Token\Token as TokenMiddleware;
use Ticaje\AeSdk\Infrastructure\Provider\Token\TokenDecorator as ResponseDecorator;
use Ticaje\AeSdk\Infrastructure\Provider\Token\Token;

/**
 * Class TokenTest
 * @package Ticaje\AeSdk\Test\Unit\Infrastructure\Authenticator
 * It turns out that there is no way to unit test fully this class since ti depends on a auth code obtained
 * synchronously on an oauth basis
 */
class TokenTest extends ParentClass
{
    private $tokenizer;

    public function setUp()
    {
        $connector = $this->getMockBuilder(Rest::class)
            ->disableOriginalConstructor()
            ->setMethods(['generateClient'])
            ->getMock();

        $middleware = $this->getMockBuilder(TokenMiddleware::class)
            ->setConstructorArgs(
                [
                    'connector' => $connector,
                    'endpoint' => 'token',
                    'verb' => 'POST',
                    'baseUri' => 'https://oauth.aliexpress.com/',

                ]
            )
            ->getMock();

        $responder = $this->getMockBuilder(ResponseDecorator::class)
            ->getMock();

        $this->tokenizer = $this->getMockBuilder(Token::class)
            ->setConstructorArgs(['middleWare' => $middleware, 'tokenResponder' => $responder])
            ->getMock();
    }

    public function testProperInterface()
    {
        $this->assertInstanceOf(TokenProviderInterface::class, $this->tokenizer);
    }

    public function testReturnInstance()
    {
        $this->assertInstanceOf(TokenProviderInterface::class, $this->tokenizer->setParams([]), 'Expect properInstance Returned');
    }

    public function testGetAccessTokenReturnsNullOnBadRequest()
    {
        $this->tokenizer->setParams([]);
        $token = $this->tokenizer->getAccessToken();
        $this->assertInstanceOf(TokenResponderInterface::class, $token);
        $this->expectException(Error::class);
        $this->assertTrue($token->getSuccess());
    }

    public function testSign()
    {
        $expectedValue = new ResponseDecorator();
        $this->tokenizer->method('getAccessToken')
            ->willReturn($expectedValue);
        $token = $this->tokenizer->getAccessToken();
        $this->assertEquals($expectedValue, $token);
    }
}
