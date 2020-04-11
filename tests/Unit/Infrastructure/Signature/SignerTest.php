<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Infrastructure\Signature;

use ArgumentCountError;

use Ticaje\AeSdk\Base\Dto;
use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Signature\SignerInterface;
use Ticaje\AeSdk\Infrastructure\Provider\Signature\Algorithm\Hash\Hash;
use Ticaje\AeSdk\Infrastructure\Provider\Signature\Builder;
use Ticaje\AeSdk\Test\Unit\BaseTest as ParentClass;

use Ticaje\AeSdk\Infrastructure\Provider\Signature\Signer;

/**
 * Class SignerTest
 * @package Ticaje\AeSdk\Test\Unit\Infrastructure\Signature
 */
class SignerTest extends ParentClass
{
    private $signer;

    public function setUp()
    {
        $builder = $this->getMockBuilder(Builder::class)
            ->setMethods(['build'])
            ->getMock();

        $algorithm = $this->getMockBuilder(Hash::class)
            ->setConstructorArgs(['algorithm' => 'md5'])
            ->setMethods(['sign'])
            ->getMock();

        $this->signer = $this->getMockBuilder(Signer::class)
            ->setConstructorArgs(['builder' => $builder, 'algorithm' => $algorithm])
            ->setMethods(['sign'])
            ->getMock();
    }

    public function testProperInterface()
    {
        $this->assertInstanceOf(SignerInterface::class, $this->signer);
    }

    public function testSignWithNoParameters()
    {
        $this->expectException(ArgumentCountError::class);
        $this->assertNotEmpty($this->signer->sign(), 'Expect error if no parameters passed along');
    }

    public function testSignWithWrongParameter()
    {
        $this->expectExceptionMessage('must be an instance of Ticaje\AeSdk\Infrastructure\Interfaces\DtoInterface');
        $this->assertNotEmpty($this->signer->sign([1, 2, 3]), 'Expect error if no parameters passed along');
    }

    public function testSign()
    {
        $dto = new Dto();
        $dto->setSecret('secretValue');
        $dto->setKey('keyValue');

        $expectedValue = 'signature';
        $unExpectedValue = false;

        $this->signer->method('sign')
            ->willReturn($expectedValue);
        $signature = $this->signer->sign($dto);

        $this->assertEquals($expectedValue, $signature);
        $this->assertNotEquals($unExpectedValue, $signature);
    }
}
