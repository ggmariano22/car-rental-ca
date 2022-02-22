<?php

namespace Domain\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ObjectRepository;
use Infrastructure\Doctrine\DoctrineInterface;
use Domain\Entity\CarEntity;

class CarService extends CarsAbstractService
{
    private EntityManager $entityManager;
    private EntityRepository $carsRepository;

    public function __construct(
        private CarEntity $carEntity,
        private DoctrineInterface $doctrineInterface
    ) {
        $this->entityManager  = $doctrineInterface->getEntityManager();
        $this->carsRepository = $this->entityManager->getRepository(CarEntity::class);
    }

    public function createCar(array $params)
    {
        $this->carEntity->setName($params['name']);
        $this->carEntity->setDescription($params['description']);
        $this->carEntity->setBrand($params['brand']);
        $this->carEntity->setCapacity($params['capacity']);

        $this->entityManager->persist($this->carEntity);
        $this->entityManager->flush();
        
        return 'Car created with ID ' . $this->carEntity->getId();
    }

    public function listCars()
    {
        return $this->extractData($this->carsRepository->findAll());
    }

    public function getById(int $id)
    {
        return $this->carsRepository->find($id)?->toArray();
    }
}
