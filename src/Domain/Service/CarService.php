<?php

namespace Domain\Service;

use Infrastructure\Doctrine\Factory\DoctrineORMFactory;
use Infrastructure\Doctrine\DoctrineInterface;
use Domain\Entity\CarEntity;

class CarService
{
    public function __construct(
        private CarEntity $carEntity,
        private DoctrineInterface $entityManager
    ) {
    }

    public function createCar(array $params)
    {
        $this->carEntity->setDescription($params['description']);
        $this->entityManager->getEntityManager()->persist($this->carEntity);
        $this->entityManager->getEntityManager()->flush();
        
        return 'Car created with ID ' . $this->carEntity->getId();
    }
}
