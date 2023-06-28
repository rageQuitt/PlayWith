<?php
// EntityManager.php
require_once "vendor/autoload.php";
require_once "database_config.php"; 

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup as ORMSetup; // Add the use statement for ORMSetup

//Set-up Doctrine
$paths = array('my_project_directory\src\Entity');
$isDevMode = false;
// ..

$dbParams = include "database_config.php"; // Remplacez l'ancienne définition de $dbParams par celle-ci

// ...

$config = ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode); // Update this line
$connection = DriverManager::getConnection($dbParams);
$entityManager = EntityManager::create($connection, $config);
