<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbb61d7a0ff0a9c5dfc616ec4946b34c3
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbb61d7a0ff0a9c5dfc616ec4946b34c3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbb61d7a0ff0a9c5dfc616ec4946b34c3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbb61d7a0ff0a9c5dfc616ec4946b34c3::$classMap;

        }, null, ClassLoader::class);
    }
}