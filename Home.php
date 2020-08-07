<?php

require_once('Database.php');
require_once('index.php');

class Home
{
    private $dbConn;

    public function __construct()
    {
        $this->dbConn = new Database();
    }
    public function  displayResults()
    {
        switch ($_GET['type']) {
            case 'pets':
                return $this->dbConn->getAllPets();
                break;

            case 'petSitter':
                return $this->dbConn->getAllSitters();
                break;
            
            default:
                return $this->dbConn->getAllPets();
                break;
        }
        
    }
}
