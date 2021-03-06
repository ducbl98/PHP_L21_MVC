<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit274b325260e0051947d4d5ad7077fd00
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'C' => 
        array (
            'Controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../M2_PHP_L21_MVC' . '/models',
        ),
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../M2_PHP_L21_MVC' . '/controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit274b325260e0051947d4d5ad7077fd00::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit274b325260e0051947d4d5ad7077fd00::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
