<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\ApcCache;
//use Doctrine\Common\ClassLoader;

use OrmTeste\Entities;

$applicationMode = 'development';

if ($applicationMode == "development") {
    $cache = new ArrayCache();
} else {
    $cache = new ApcCache();
}

//$classLoader = new ClassLoader('Doctrine\DBAL\Migrations', 'vendor/doctrine/migrations');
//$classLoader->register();

$config = new Configuration;
$config->setMetadataCacheImpl($cache);
$driverImpl = $config->newDefaultAnnotationDriver(__DIR__ . '/src/OrmTeste/Entities');
$config->setMetadataDriverImpl($driverImpl);
$config->setQueryCacheImpl($cache);
$config->setProxyDir('OrmTeste/Library/OrmTeste/Proxies');
$config->setProxyNamespace('OrmTeste\Library\Proxies');

if ($applicationMode == "development") {
    $config->setAutoGenerateProxyClasses(true);
} else {
    $config->setAutoGenerateProxyClasses(false);
}

$connectionOptions = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'doctrine',
);

$em = EntityManager::create($connectionOptions, $config);