<?php

class Database
{
    private $SERVERNAME = "localhost";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DBNAME = 'watchmadog';
    // private $PORT = '';
    private $CONN;

    function __construct()
    {
        // Create connection
        $conn = mysqli_connect($this->SERVERNAME, $this->USERNAME, $this->PASSWORD, $this->DBNAME);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $this->CONN = $conn;
    }

    function getUsername()
    {
        return $this->USERNAME;
    }

    function getAllPets()
    {
        $sql = 'SELECT * FROM pets';
        $result = $this->CONN->query($sql);
        $resultArray = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($resultArray, $row);
            }
        }
        $this->CONN->close();
        return $resultArray;
    }

    function getAllSitters()
    {
        $sql = 'SELECT * FROM dogsitters';
        $result = $this->CONN->query($sql);
        $resultArray = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($resultArray, $row);
            }
        }
        $this->CONN->close();
        return $resultArray;
    }
}
