<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd001eb73d41e0b827bd002613c394390
{
    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'primakurzy\\Shortcode\\' => 21,
        ),
        'T' => 
        array (
            'Thunder\\Shortcode\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'primakurzy\\Shortcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/primakurzy/shortcode/src',
        ),
        'Thunder\\Shortcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/thunderer/shortcode/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd001eb73d41e0b827bd002613c394390::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd001eb73d41e0b827bd002613c394390::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd001eb73d41e0b827bd002613c394390::$classMap;

        }, null, ClassLoader::class);
    }
}
