<?php

use Infrastructure\Doctrine\Factory\DoctrineORMFactory;

$container = require('./config/dependency.php');
$entityManager = new DoctrineORMFactory($container);
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager->getEntityManager());
