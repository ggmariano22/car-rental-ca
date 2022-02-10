<?php

class CarEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $description;

    public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription (string $description) {
        $this->description = $description;
    }
}
