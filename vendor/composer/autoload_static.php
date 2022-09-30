<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit30349174db187295cc0577f2a8d9edeb
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit30349174db187295cc0577f2a8d9edeb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit30349174db187295cc0577f2a8d9edeb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit30349174db187295cc0577f2a8d9edeb::$classMap;

        }, null, ClassLoader::class);
    }
}
