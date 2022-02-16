<?php

use Infrastructure\Doctrine\Factory\DoctrineORMFactory;

$entityManager = new DoctrineORMFactory();
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager->getEntityManager());
