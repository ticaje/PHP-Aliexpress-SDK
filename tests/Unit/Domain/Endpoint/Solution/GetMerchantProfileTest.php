<?php
declare(strict_types=1);

/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution;

use Ticaje\AeSdk\Test\Unit\Domain\Endpoint\BaseTest as ParentClass;

use Ticaje\AeSdk\Domain\Endpoint\Solution\Merchant\Profile\Get;

/**
 * Class GetMerchantProfileTest
 * @package Ticaje\AeSdk\Test\Unit\Domain\Endpoint\Solution
 */
class GetMerchantProfileTest extends ParentClass
{
    protected $class = Get::class;

    protected $apiMethodName = 'aliexpress.solution.merchant.profile.get';

    protected $params = [];
}
