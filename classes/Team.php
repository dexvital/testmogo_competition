<?php

namespace classes;

use Doctrine\ORM\Mapping\Entity;
use interfaces\TeamInterface;
use Entity\Team as ETeam;

class Team implements TeamInterface
{
    private $number = 0;
    /**
     * \Entity\Team
     */
    private $team;

    /**
     * Team constructor.
     */
    public function __construct($number)
    {
        $this->number = $number;
        $this->checkDB();
    }

    private function checkDB()
    {
        $em = Services::entityManager();
        $this->team = $em->getRepository('Entity\Team')->find($this->number);
        if (empty($this->team)) {
            $this->team = new ETeam();
            $this->team->setId($this->number);

            $em->persist($this->team);
            $em->flush();
        }
    }

    public function getEntety()
    {
        return $this->team;
    }

    public function getNumber() :int
    {
        return $this->number;
    }

}