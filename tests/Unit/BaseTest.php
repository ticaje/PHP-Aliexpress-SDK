<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit;

use PHPUnit\Framework\TestCase as ParentClass;

/**
 * Class BaseTest
 * @package Ticaje\AeSdk\Test\Unit
 */
abstract class BaseTest extends ParentClass
{
    public function testProofOfLife()
    {
        $this->assertTrue(true);
    }
}
