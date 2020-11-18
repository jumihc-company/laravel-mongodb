<?php
/**
 * User: YL
 * Date: 2020/11/17
 */

namespace Jmhc\Mongodb;

use Illuminate\Support\ServiceProvider;

class JmhcServiceProvider extends ServiceProvider
{
    public function register()
    {
        // 合并配置
        $this->mergeConfig();
    }

    /**
     * 合并配置
     */
    protected function mergeConfig()
    {
        // 合并 mongodb 配置
        $this->mergeConfigFrom(
            __DIR__ . '/../config/mongodb.php',
            'database.connections.mongodb'
        );
    }
}