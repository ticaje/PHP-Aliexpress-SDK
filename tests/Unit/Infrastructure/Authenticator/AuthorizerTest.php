<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Infrastructure\Authenticator;

use ArgumentCountError;

use Ticaje\AeSdk\Test\Unit\BaseTest as ParentClass;

use Ticaje\AeSdk\Infrastructure\Interfaces\Provider\Auth\GrantAccessInterface;
use Ticaje\AeSdk\Infrastructure\Provider\Authorization\Authorizer;
use Ticaje\AeSdk\Infrastructure\Provider\Authorization\Builder;

/**
 * Class AuthTest
 * @package Ticaje\AeSdk\Test\Unit\Infrastructure\Authenticator
 */
class AuthorizerTest extends ParentClass
{
    private $authorizer;

    private $baseUri = 'https://base.uri';

    public function setUp()
    {
        parent::setUp();
        $this->authorizer = new Authorizer(new Builder(), $this->baseUri);
    }

    public function testProperInterface()
    {
        $this->assertInstanceOf(GrantAccessInterface::class, $this->authorizer);
    }

    public function testGetAuthUrlFailsWithNoArguments()
    {
        $this->expectException(ArgumentCountError::class);
        $this->assertNotEmpty($this->authorizer->getAuthUrl(), 'Expect to fail with no Arguments passed along');
    }

    public function testGetAuthUrl()
    {
        $authUrl = $this->authorizer->getAuthUrl(['client_id' => '666666', 'callback' => 'http://callabck.url']);
        $this->assertNotEmpty($authUrl);
    }
}
