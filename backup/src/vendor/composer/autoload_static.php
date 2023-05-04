<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5ff67bdf00fddf6fd8457463cbbc4497
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'mikehaertl\\wkhtmlto\\' => 20,
            'mikehaertl\\tmp\\' => 15,
            'mikehaertl\\shellcommand\\' => 24,
        ),
        'P' => 
        array (
            'ParseCsv\\tests\\' => 15,
            'ParseCsv\\extensions\\' => 20,
            'ParseCsv\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'mikehaertl\\wkhtmlto\\' => 
        array (
            0 => __DIR__ . '/..' . '/mikehaertl/phpwkhtmltopdf/src',
        ),
        'mikehaertl\\tmp\\' => 
        array (
            0 => __DIR__ . '/..' . '/mikehaertl/php-tmpfile/src',
        ),
        'mikehaertl\\shellcommand\\' => 
        array (
            0 => __DIR__ . '/..' . '/mikehaertl/php-shellcommand/src',
        ),
        'ParseCsv\\tests\\' => 
        array (
            0 => __DIR__ . '/..' . '/parsecsv/php-parsecsv/tests',
        ),
        'ParseCsv\\extensions\\' => 
        array (
            0 => __DIR__ . '/..' . '/parsecsv/php-parsecsv/src/extensions',
        ),
        'ParseCsv\\' => 
        array (
            0 => __DIR__ . '/..' . '/parsecsv/php-parsecsv/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5ff67bdf00fddf6fd8457463cbbc4497::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5ff67bdf00fddf6fd8457463cbbc4497::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
