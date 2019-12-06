<?php

class Database() {
    private var $mysqlConnection = "";
    
    function __construct($ip, $db, $user, $pass) {
        // Make Connection String
        $newMysqlConnection = mysqli_connect($ip, $user, $pass, $db);

        // Test Connection String
        if(!$newMysqlConnection){
            // Store Connection
            $this->mysqlConnection = $newMysqlConnection;

            // Return
            return true;
        }
        else{
            // Kill and return
            exit false;
        }
    }
    
    function QueryDatabase($queryString){
        // Attempt Query Use
        try {
            // Do Query
            $queryResult = mysqli_query($this->$mysqlConnection, $queryString);

            // If Valid Result
            if(mysqli_num_rows($queryResult) > 0) {
                // Return Query
                return($queryResult);
            }
            else{
                return(null);
            }
        }
        // Not able to use queries
        catch(Exception $Except) {
            // Log it
            error_log("!!! Error in doing Query !!! --- " . $Except)

            // Kill and return
            exit null;
        }
    }

    function EscapeString($string){
        // Do Escape
        return(mysqli_real_escape_string($this->$mysqlConnection, $string));
    }

    function StartSession($userId){
        // Start Session
        session_start();

        // Session Store Credentials
        $_SESSION["USER-ID"] = $userId;
        $_SESSION["LOGGED-IN"] = true;
    }

    function CheckSession(){
        // Test if User ID > -1 and if Logged In is Set and true
        if (isset($_SESSION['USER-ID']) && 
            $_SESSION['USER-ID'] > -1 && 
            isset($_SESSION['LOGGED-IN']) && 
            $_SESSION['LOGGED-IN'] == true)
        {
            return true;
        }
        else{
            return false;
        }

    }

    function EndSession(){
        // Remove Session Credentials
        $_SESSION["USER-ID"] = null;
        $_SESSION["LOGGED-IN"] = false;

        // Kill Session
        session_destroy();
    }
}

?>