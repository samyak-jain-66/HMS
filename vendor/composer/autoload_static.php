<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad1a46602b1af444920a14fc0ca3fbd8
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad1a46602b1af444920a14fc0ca3fbd8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad1a46602b1af444920a14fc0ca3fbd8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
