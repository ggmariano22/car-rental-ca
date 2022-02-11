<?php

use Infrastructure\Factory\Doctrine\DoctrineORMFactory;

$entityManager = new DoctrineORMFactory();
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager->getEntityManager());
