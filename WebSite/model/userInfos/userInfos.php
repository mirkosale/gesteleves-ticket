<?php

class connexionValues {
    
    private $host = 'localhost';
    private $user = 'dbUserTickets';
    private $dbname = 'dbTickets';
    private $port = 'ServerPort';

    public function getValues(){
        $values = array("host"=>$this->host, "user"=>$this->user, "dbname"=>$this->dbname, "port"=>$this->port);
        return $values;
    }
}
?>