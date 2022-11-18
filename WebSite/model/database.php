<?php

/**
 * 
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
    public function TesteSipmle(){
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
    public function TestPrepare($email, $password, $username){
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
 }
?>