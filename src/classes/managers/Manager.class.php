<?php

class Manager
{
    protected PDO $bdd;

    public function __construct(PDO $database_connection)
    {
        $this->bdd = $database_connection;
    }
}