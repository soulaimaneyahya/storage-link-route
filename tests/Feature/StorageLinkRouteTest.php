<?php

namespace Soulaimaneyh\StorageLinkRoute\Tests\Feature;

use Illuminate\Filesystem\Filesystem;
use Soulaimaneyh\StorageLinkRoute\Tests\TestBase;

class StorageLinkRouteTest extends TestBase
{
    public function testCanExecuteStorageLinkCommandFromRoute()
    {
        $this->withExceptionHandling();

        // Filesystem class that we can use in our test to verify that it's being called correctly
        $spy = $this->spy(Filesystem::class);

        $this->get('/storage-link-route')
            ->assertSuccessful()
            ->assertSeeText('The [public/storage] directory has been linked.');

        // assure link method called from $spy instance.
        $spy->shouldHaveReceived('link')->with(
            storage_path('app/public'),
            public_path('storage')
        );

        $spy->shouldHaveReceived('exists')->with(
            public_path('storage')
        );
    }

    public function testCanStorageLinkAlreadyExist()
    {
        $this->withExceptionHandling();
        $this->mock(Filesystem::class)->shouldReceive('exists')->andReturn(true);

        $this->get('/storage-link-route')
            ->assertSuccessful()
            ->assertSeeText('The [public/storage] directory already exist.');
    }
}
