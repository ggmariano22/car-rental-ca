<?php

namespace Domain\Service;

use Infrastructure\Factory\Doctrine\DoctrineORMFactory;
use Domain\Entity\CarEntity;

class CarService
{
    public $carEntity;
    public $entityManager;

    public function __construct()
    {
        $this->carEntity = new CarEntity();
        $this->entityManager = new DoctrineORMFactory();
    }

    public function createCar(array $params)
    {
        $this->carEntity->setDescription($params['description']);
        $this->entityManager->getEntityManager()->persist($this->carEntity);
        $this->entityManager->getEntityManager()->flush();
        
        return 'Car created with ID ' . $this->carEntity->getId();
    }
}
