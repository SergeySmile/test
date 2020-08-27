<?php
declare(strict_types = 1);

use Admin\Domain\Model\Value\CategoryId;
use Admin\Domain\Model\Value\ItemId;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Infrastructure\Admin\Doctrine\Type\CategoryIdType;
use Infrastructure\Admin\Doctrine\Type\ItemIdType;

require_once(__DIR__ . '/../helpers.php');
// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$config = Setup::createXMLMetadataConfiguration(array(__DIR__ . "/../mapping"), $isDevMode, $proxyDir, $cache);

Type::addType(ItemId::class, ItemIdType::class);
Type::addType(CategoryId::class, CategoryIdType::class);
$dotenv = Dotenv\Dotenv::createMutable(dirname(__DIR__));
$dotenv->load();

$connection = require __DIR__ . '/db.php';
//var_dump($connection);exit;
// EntityManager is our entry point for the ORM
return EntityManager::create($connection, $config);