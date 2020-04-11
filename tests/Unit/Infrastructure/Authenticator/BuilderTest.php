<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Infrastructure\Authenticator;

use PHPUnit\Framework\Exception;

use Ticaje\AeSdk\Test\Unit\BaseTest as ParentClass;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Auth\AuthBuilderInterface;
use Ticaje\AeSdk\Infrastructure\Provider\Authorization\Builder;

/**
 * Class AuthTest
 * @package Ticaje\AeSdk\Test\Unit\Infrastructure\Authenticator
 */
class BuilderTest extends ParentClass
{
    private $builder;

    public function setUp()
    {
        parent::setUp();
        $this->builder = new Builder();
    }

    public function testBuildFailsWithEmptyParams()
    {
        $this->expectException(Exception::class);
        $this->assertNotEmpty($this->builder->build([]), 'Expect to fail with empty params');
    }

    public function testProperInterface()
    {
        $this->assertInstanceOf(AuthBuilderInterface::class, $this->builder);
    }

    public function testBuildOK()
    {
        $this->assertNotEmpty($this->builder->build(['client_id' => '666666', 'callback' => 'http://callabck.url']), 'Ok');
    }

    public function testBuildMissingClientId()
    {
        $this->expectException(Exception::class);
        $this->assertNotEmpty($this->builder->build(['callback' => 'http://callabck.url']), 'Missing Client ID');
    }

    public function testBuildMissingCallback()
    {
        $this->expectException(Exception::class);
        $this->assertNotEmpty($this->builder->build(['client_id' => '666666']), 'Missing Callback');
    }
}
