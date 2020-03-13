<?php

namespace App\Entity;

use App\Entity\Type;
use Symfony\Component\Form\AbstractType;

class EvenementSearch extends AbstractType{


    /**
     * @var Type
     */
    private $evenements;

    public function __construct()
    {
        $this->evenements = new Evenement();
    }

    /**
     * @return Type
     */
    public function getType(): Evenement
    {
        return $this->evenements;
    }

    /**
     * @param Type $evenements
     */
    public function setType(Type $evenements): void
    {
        $this->evenements = $evenements;
    }
    
}
