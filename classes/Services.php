<?php

namespace classes;

use classes\Mysql;

class Services
{
    public static function mysql()
    {
        return Mysql::getInstance();
    }
}