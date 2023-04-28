<?php

namespace Soulaimaneyh\StorageLinkRoute\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class StorageLinkController extends Controller
{
    public function __invoke(Filesystem $filesystem)
    {
        // Artisan::call('storage:link');

        if ($filesystem->exists(public_path('storage'))) {
            return 'The "public/storage" directory already exist.';
        }

        $filesystem->link(
            storage_path('app/public'),
            public_path('storage')
        );

        return 'The [public/storage] directory has been linked.';
    }
}
