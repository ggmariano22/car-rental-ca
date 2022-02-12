<?php

namespace Infrastructure\Doctrine;

use Doctrine\ORM\EntityManager;

interface DoctrineInterface
{
    /**
     * @return EntityManager
     */
    public function getEntityManager();
}
