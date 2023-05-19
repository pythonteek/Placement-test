<?php

class Defaults{
    //The necessary variables to database connection.
    private $servername;
    private $username;
    private $password;
    private $database;
    
    function set($token){
        //The token is used for more security.
        if($token == "1da1be00750588a48bb1d90cdbc266a1"){
            //The values are defined for connecting to localhost. Therefore, it is different from the original values.
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->database = "pythonte_DB";
        }
    }
    
    function get(){
        //Returns class values.
        $servername = $this->servername;
        $username = $this->username;
        $password = $this->password;
        $database = $this->database;
        
        $data = array();
        
        array_push($data, $servername);
        array_push($data, $username);
        array_push($data, $password);
        array_push($data, $database);
        
        return($data);
    }
}

?>
