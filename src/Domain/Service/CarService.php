<?php

namespace Domain\Service;

use Infrastructure\Doctrine\Factory\DoctrineORMFactory;
use Infrastructure\Doctrine\DoctrineInterface;
use Domain\Entity\CarEntity;

class CarService extends CarsAbstractService
{
    public function __construct(
        private CarEntity $carEntity,
        private DoctrineInterface $entityManager
    ) {
    }

    public function createCar(array $params)
    {
        $entityManager = $this->entityManager->getEntityManager();

        $this->carEntity->setDescription($params['description']);
        $entityManager->persist($this->carEntity);
        $entityManager->flush();
        
        return 'Car created with ID ' . $this->carEntity->getId();
    }

    public function listCars()
    {
        $entityManager = $this->entityManager->getEntityManager();
        $carsRepository = $entityManager->getRepository(CarEntity::class);
        
        return $this->extractDescription($carsRepository->findAll());
    }
}
