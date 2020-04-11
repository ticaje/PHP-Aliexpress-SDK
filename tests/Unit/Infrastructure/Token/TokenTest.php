<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Infrastructure\Authenticator;

use Ticaje\AeSdk\Test\Unit\BaseTest as ParentClass;

use Ticaje\Connector\Gateway\Client\Rest;
use Ticaje\Connector\Interfaces\Provider\Token\TokenProviderInterface;

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

        $this->tokenizer = $this->getMockBuilder(Token::class)
            ->setConstructorArgs(
                [
                    'connector' => $connector,
                    'endpoint' => 'token',
                    'verb' => 'POST',
                    'baseUri' => 'https://oauth.aliexpress.com/',

                ]
            )
            ->setMethods(['getAccessToken', 'setParams'])
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
        $this->assertNull($token);
    }

    public function testSign()
    {
        $expectedValue = 'token';
        $this->tokenizer->method('getAccessToken')
            ->willReturn($expectedValue);
        $token = $this->tokenizer->getAccessToken();
        $this->assertEquals($expectedValue, $token);
    }
}
