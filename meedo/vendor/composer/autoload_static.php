<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5f29682cd6258ff2114211249e38ce4f
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Medoo\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Medoo\\' => 
        array (
            0 => __DIR__ . '/..' . '/catfan/medoo/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5f29682cd6258ff2114211249e38ce4f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5f29682cd6258ff2114211249e38ce4f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5f29682cd6258ff2114211249e38ce4f::$classMap;

        }, null, ClassLoader::class);
    }
}
