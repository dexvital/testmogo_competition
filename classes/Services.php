<?php

namespace classes;

class Services
{
    public static function mysql()
    {
        $link = mysqli_connect('localhost', $_ENV['MOGO_DB_USER'], $_ENV['MOGO_DB_PASS'], $_ENV['MOGO_DB_DB']);
        return $link;
    }
}