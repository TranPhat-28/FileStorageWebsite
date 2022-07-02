<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd3362faeee6e03e273e191a839d27192
{
    public static $classMap = array (
        'LoggerInterface' => __DIR__ . '/..' . '/owasp/csrf-protector-php/libs/csrf/LoggerInterface.php',
        'alreadyInitializedException' => __DIR__ . '/..' . '/owasp/csrf-protector-php/libs/csrf/csrfprotector.php',
        'configFileNotFoundException' => __DIR__ . '/..' . '/owasp/csrf-protector-php/libs/csrf/csrfprotector.php',
        'csrfProtector' => __DIR__ . '/..' . '/owasp/csrf-protector-php/libs/csrf/csrfprotector.php',
        'csrfpAction' => __DIR__ . '/..' . '/owasp/csrf-protector-php/libs/csrf/csrfpAction.php',
        'csrfpCookieConfig' => __DIR__ . '/..' . '/owasp/csrf-protector-php/libs/csrf/csrfpCookieConfig.php',
        'csrfpDefaultLogger' => __DIR__ . '/..' . '/owasp/csrf-protector-php/libs/csrf/csrfpDefaultLogger.php',
        'incompleteConfigurationException' => __DIR__ . '/..' . '/owasp/csrf-protector-php/libs/csrf/csrfprotector.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitd3362faeee6e03e273e191a839d27192::$classMap;

        }, null, ClassLoader::class);
    }
}