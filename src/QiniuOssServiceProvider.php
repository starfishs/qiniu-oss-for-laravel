<?php

namespace Gming\QiniuOss;

use Illuminate\Support\ServiceProvider;

class QiniuOssServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $root = dirname(__DIR__);
        if (!file_exists(config_path('qiniu-oss.php'))) {
            $this->publishes([
                $root.'/config/qiniu-oss.php' => config_path('qiniu-oss.php'), // public config file
            ], 'config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/config/qiniu-oss.php', 'qiniu-oss');
    }

}
