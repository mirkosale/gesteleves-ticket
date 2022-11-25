<?php

/*
 * Auteur : Emilien Charpié
 * Date : 29.03.2022
 * Description :  File that take the informations from the database
 */

include 'model/userInfos/userInfos.php';

class Database {
    
    
    // Variable de classe
    private $connector;
    private $connexionValues;


    public function __construct(){
        //Get the values from the php file for the pdo
        $connexion = new connexionValues();
        $this->connexionValues = $connexion->getValues();

        //Get the value from the json file for the password
        $Json = file_get_contents("model/userInfos/passwords.json");
        // Converts to an array 
        $passwordArray = json_decode($Json, true);

        try {
            $dns = "mysql:host=".$this->connexionValues['host'].";dbname=".$this->connexionValues['dbname'].";charset=utf8";
            $this->connector = new PDO($dns, $this->connexionValues['user'], $passwordArray[0]['pass']);
            $this->connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "PDOError: " . $e->getMessage()." In ".__FILE__;
        }
    }

    /**
     * Do a simple query request
     * @return array
     */
    private function querySimpleExecute($query){
        //Do a query to the connector with the parameter
        $req = $this->connector->query($query);
        //Set an array with the value
        $array = $this->formatData($req);
        // Return the array
        return $array;
    }

    /**
     * Do a prepare query with a binds
     * @return array
     */
    private function queryPrepareExecute($query, $binds){
        //Prepare the query
        $req = $this->connector->prepare($query);
        //Insert the values
        foreach ($binds as $key => $value) {
            $req->bindValue($binds[$key]['varName'], $binds[$key]['value'], $binds[$key]['type']);
        }
        //Execute the query
        $req->execute();
        //Set an array with the result
        $arrayResult = $this->formatData($req);
        //Return the array
        return $arrayResult;
    }

    /**
     * Format the result of a query in an array 
     * @return array
     */
    private function formatData($req){
        $array = $req->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    /**
     * Clear the record set
     */
    private function unsetData($req){

        // Clear Record Set
        $req->closeCursor();
    }

    /**
     * Select all the users
     */
    public function testeSipmle(){
        // Get the informations of the user
        $queryRequest = "SELECT * FROM t_users";
        // Execute the request
        $usersReturned = $this->querySimpleExecute($queryRequest);
        //return the array
        return $usersReturned;
    }

    /**
     * Insert a user to the database
     */
    public function testPrepare($email, $password, $username){
        // Get the informations of the user
        $queryRequest = "INSERT INTO `t_users` (`useEmail`, `usePassword`, `useUsername`)
        VALUES (:email, :password, :username);";
        // Set an array with the binds values
        $arrayBinds = array(
            array("varName" => "email", "value" => $email, "type" => PDO::PARAM_STR),
            array("varName" => "password", "value" => $password, "type" => PDO::PARAM_STR),
            array("varName" => "username", "value" => $username, "type" => PDO::PARAM_STR)
        );
        // Insert the user
        $this->queryPrepareExecute($queryRequest, $arrayBinds);
    }

    /**
     * Insert a user to the database
     */
    public function insertTicket($title, $description, $status, $priority, $openDate, $user, $type){
        // Get the informations of the user
        $queryRequest = "INSERT INTO `t_ticket` (`ticTitle`, `ticDescription`, `ticFilename` , `idStatus`, `idPriority`, `ticOpenDate`, `idUser`, `idType`)
        VALUES (:title, :description, :filename, :status, :priority, :openDate, :user, :type);";
        // Set an array with the binds values
        $arrayBinds = array(
            array("varName" => "title", "value" => $title, "type" => PDO::PARAM_STR),
            array("varName" => "description", "value" => $description, "type" => PDO::PARAM_STR),
            array("varName" => "filename", "value" => $filename, "type" => PDO::PARAM_STR),
            array("varName" => "status", "value" => $status, "type" => PDO::PARAM_STR),
            array("varName" => "priority", "value" => $priority, "type" => PDO::PARAM_STR),
            array("varName" => "openDate", "value" => $openDate, "type" => PDO::PARAM_STR),
            array("varName" => "user", "value" => $user, "type" => PDO::PARAM_STR),
            array("varName" => "type", "value" => $type, "type" => PDO::PARAM_INT)
        );
        // Insert the user
        $this->queryPrepareExecute($queryRequest, $arrayBinds);
    }

    /**
     * Select a ticket
     */
    public function selectOneTicket($id){
        // Get the informations of the user
        $queryRequest = "SELECT * FROM t_ticket as `t` JOIN t_user as `u` on t.idUser = u.idUser WHERE idTicket = :id ";
        $binds = [
            ["name" => "id", "value" => $id, "type" => PDO::PARAM_INT]
        ];
        // Execute the request
        $usersReturned = $this->queryPrepareExecute($queryRequest, $binds);
        //return the array
        return $usersReturned;
    }

    /**
     * Select last 10 tickets
     */
    public function selectLastTenTickets(){
        $queryRequest = "SELECT * FROM t_ticket ORDER BY ticOpenDate DESC LIMIT 10";

        // Execute the request
        $usersReturned = $this->querySimpleExecute($queryRequest);
        return $usersReturned;
    }

    /**
     * Select last 10 tickets
     */
    public function selectTenHighestPriorityTickets(){
        $queryRequest = "SELECT * FROM t_ticket ORDER BY ticPriority DESC LIMIT 10";

        // Execute the request
        $usersReturned = $this->querySimpleExecute($queryRequest);
        return $usersReturned;
    }
 }
?>