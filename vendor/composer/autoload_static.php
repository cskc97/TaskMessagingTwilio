<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4f8b5df96e829dea23d5d9abdd49e6a2
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
        'P' => 
        array (
            'Parse\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/Twilio',
        ),
        'Parse\\' => 
        array (
            0 => __DIR__ . '/..' . '/parse/php-sdk/src/Parse',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4f8b5df96e829dea23d5d9abdd49e6a2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4f8b5df96e829dea23d5d9abdd49e6a2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
