<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit58762fe8e2493cf25d9ba7343148a9ef
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Services\\' => 13,
            'App\\Models\\' => 11,
            'App\\Controllers\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Services\\' => 
        array (
            0 => __DIR__ . '/../..' . '/apps/services',
        ),
        'App\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/apps/models',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/apps/controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit58762fe8e2493cf25d9ba7343148a9ef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit58762fe8e2493cf25d9ba7343148a9ef::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
