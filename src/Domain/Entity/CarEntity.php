<?php

namespace Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cars")
 */
class CarEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     */
    private $brand;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacity;

    public function getId() {
        return $this->id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription (string $description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setBrand (string $brand) {
        $this->brand = $brand;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setCapacity (string $capacity) {
        $this->capacity = $capacity;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function toArray()
    {
        return [
            'id'          =>$this->getId(),
            'name'        => $this->getName(),
            'description' => $this->getDescription(),
            'brand'       => $this->getBrand(),
            'capacity'    => $this->getCapacity(),
        ];
    }
}
