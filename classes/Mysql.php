<?php

namespace classes;


class Mysql
{
    private $connection;

    protected static $instance = null;

    /**
     * Mysql constructor.
     */
    public function __construct()
    {
        if (getenv('MOGO_DB_DB')) {
            $this->connection = mysqli_connect('localhost',
                                    getenv('MOGO_DB_USER'),
                                    getenv('MOGO_DB_PASS'),
                                    getenv('MOGO_DB_DB'));

            $this->createDb();
        }
    }

    /**
     * @return Mysql
     */
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    /**
     *
     */
    public function createDb() :void
    {
        $sql[] = '
            CREATE TABLE IF NOT EXISTS team_result {
                competition INT INT NULL DEFAULT 0,
                comp_level INT NOT NULL DEFAULT 0, 
                winner INT NOT NULL DEFAULT 0,
                loser INT NOT NULL DEFAULT 0
            }';

    }
}