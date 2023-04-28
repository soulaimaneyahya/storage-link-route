<?php

namespace Soulaimaneyh\StorageLinkRoute\Providers;

use \Illuminate\Foundation\Support\Providers\RouteServiceProvider;
class StorageLinkRouteServiceProvider extends RouteServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom($this->basePath('routes/web.php'));
    }

    public function register()
    {
        //
    }

    protected function basePath($path = "")
    {
        return __DIR__ . '/../../' . $path;
    }
}
