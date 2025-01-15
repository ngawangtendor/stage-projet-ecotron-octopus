<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4813a2caeffe15d5f130af44d0fc216e
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Octopus\\Bibliotheque\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Octopus\\Bibliotheque\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4813a2caeffe15d5f130af44d0fc216e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4813a2caeffe15d5f130af44d0fc216e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit4813a2caeffe15d5f130af44d0fc216e::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit4813a2caeffe15d5f130af44d0fc216e::$classMap;

        }, null, ClassLoader::class);
    }
}
