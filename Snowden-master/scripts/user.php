<?php 

class User() {
    private var $status = 401;
    private var $username = "";
    private var $is_admin = 0;
    private var $rep = 0;
    private var $date_created = 01-01-1970;
    private var $deleted = 0;

    function __construct($database, $userId) {
        // Query with UserID
        $mysqlUser = $database->QueryDatabase("SELECT 1 FROM users WHERE user_id='$userId'");

        // If Query Returned
        if($mysqlUser){
            // Get Assoc
            $mysqlUser = $mysqlUser -> fetch_assoc();

            // Test Assoc
            if($mysqlUser["user_id"] > -1){
                // Set Username in OBJ
                $this->username = $mysqlUser["username"];

                // Set Admin in OBJ
                $this->is_admin = $mysqlUser["is_admin"];

                // Set Rep in OBJ
                $this->rep = $mysqlUser["rep"];

                // Set Date in OBJ
                $this->date = $mysqlUser["date_created"];

                // Set Deleted in OBJ
                $this->deleted = $mysqlUser["deleted"];

                // Set Status: Good Request
                $this->status = 200;
            }
            else{
                // Set Status: Bad Request
                $this->status = 400;
            }
        }
        else{
            // Set Status: Missing Entry
            $this->status = 404;
        }
    }

    function __construct($database, $postUsername, $postPassword) {
        // Strip Posts
        $postUsername = strip_tags($postUsername);
        $postPassword = strip_tags($postPassword);

        // Escape String
        $username = $database->EscapeString($postUsername);
        $password = $database->EscapeString($postPassword);

        // Hash Password
        $password = password_hash($password, PASSWORD_BCRYPT));

        // Query with UserID
        $mysqlUser = $database->QueryDatabase("SELECT 1 FROM users WHERE username='$username'");

        // If Query Returned
        if($mysqlUser){
            // Get Assoc
            $mysqlUser = $mysqlUser -> fetch_assoc();

            // Test Assoc
            if($mysqlUser["user_id"] > -1){
                // Check Password
                if(password_verify($password, $mysqlUser["pass"]){
                    // Set Username in OBJ
                    $this->username = $mysqlUser["username"];

                    // Set Admin in OBJ
                    $this->is_admin = $mysqlUser["is_admin"];

                    // Set Rep in OBJ
                    $this->rep = $mysqlUser["rep"];

                    // Set Date in OBJ
                    $this->date = $mysqlUser["date_created"];

                    // Set Deleted in OBJ
                    $this->deleted = $mysqlUser["deleted"];

                    // Set Status: Good Request
                    $this->status = 200;
                }
                else{
                    // Set Status: Unauthorised
                    $this->status = 401;
                }
            }
            else{
                // Set Status: Bad Request
                $this->status = 400;
            }
        }
        else{
            // Set Status: Missing Entry
            $this->status = 404;
        }
    }

    function GetStatus(){
        return($status);
    }
}

?>