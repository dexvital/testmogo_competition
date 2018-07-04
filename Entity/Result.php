<?php

namespace Entity;

/**
 * Result
 *
 * @Table(name="result")
 * @Entity
 */
class Result
{
    /**
     * @var int
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Entity\Team", inversedBy="winner")
     * @JoinColumn(name="winner_id", referencedColumnName="id")
     */
    private $winner;

    /**
     * @ManyToOne(targetEntity="Entity\Team", inversedBy="loser")
     * @JoinColumn(name="loser_id", referencedColumnName="id")
     */
    private $loser;



    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * @param mixed $winner
     */
    public function setWinner($winner)
    {
        $this->winner = $winner;
    }

    /**
     * @return mixed
     */
    public function getLoser()
    {
        return $this->loser;
    }

    /**
     * @param mixed $loser
     */
    public function setLoser($loser)
    {
        $this->loser = $loser;
    }
}
