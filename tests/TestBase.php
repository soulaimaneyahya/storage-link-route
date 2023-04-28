<?php

namespace Soulaimaneyh\StorageLinkRoute\Tests;

use Soulaimaneyh\StorageLinkRoute\Providers\StorageLinkRouteServiceProvider;
use Orchestra\Testbench\TestCase;

class TestBase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            StorageLinkRouteServiceProvider::class
        ];
    }
}
