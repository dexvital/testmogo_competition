<?php

namespace classes;

class Services
{
    public static function entityManager()
    {
        global $entityManager;
        return $entityManager;
    }
}