<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Infrastructure\Signature;

use ArgumentCountError;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\SignatureAlgorithmInterface;
use Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm\Hash\Hash;
use Ticaje\AeSdk\Test\Unit\BaseTest as ParentClass;

/**
 * Class HashTest
 * @package Ticaje\AeSdk\Test\Unit\Infrastructure\Signature
 */
class HashTest extends ParentClass
{
    private $algorithm;

    public function setUp()
    {
        $this->algorithm = $this->getMockBuilder(Hash::class)
            ->setConstructorArgs(['algorithm' => 'md5'])
            ->setMethods(['sign'])
            ->getMock();
    }

    public function testProperInterface()
    {
        $this->assertInstanceOf(SignatureAlgorithmInterface::class, $this->algorithm);
    }

    public function testSignWithNoParameters()
    {
        $this->expectException(ArgumentCountError::class);
        $this->assertNotEmpty($this->algorithm->sign(), 'Expect error if no parameters passed along');
    }

    public function testSignWithWrongParameter()
    {
        $regEx = '/Argument 1 passed to .* must be of the type string, array given/';
        $this->expectExceptionMessageRegExp($regEx);
        $this->assertNotEmpty($this->algorithm->sign([1, 2, 3]), 'Expect error if no parameters passed along');
    }

    public function testSign()
    {
        $expectedValue = 'signature';
        $unExpectedValue = false;

        $this->algorithm->method('sign')
            ->willReturn($expectedValue);
        $signature = $this->algorithm->sign('message', 'secret');

        $this->assertEquals($expectedValue, $signature);
        $this->assertNotEquals($unExpectedValue, $signature);
    }
}
