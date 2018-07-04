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

    /**
     * Check if team is in db, if not save's to db
     */
    private function checkDB() :void
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

    /**
     * @return \Entity\Team
     */
    public function getEntety() :\Entity\Team
    {
        return $this->team;
    }

    /**
     * @return int
     */
    public function getNumber() :int
    {
        return $this->number;
    }

}