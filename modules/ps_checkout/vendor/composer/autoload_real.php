<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit763fbc8d1d0387e78b126220be7791ad
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit763fbc8d1d0387e78b126220be7791ad', 'loadClassLoader'), true, false);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit763fbc8d1d0387e78b126220be7791ad', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit763fbc8d1d0387e78b126220be7791ad::getInitializer($loader));

        $loader->register(false);

        $includeFiles = \Composer\Autoload\ComposerStaticInit763fbc8d1d0387e78b126220be7791ad::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire763fbc8d1d0387e78b126220be7791ad($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire763fbc8d1d0387e78b126220be7791ad($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
