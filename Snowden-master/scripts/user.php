<?php 

class User {
    private $status = 400;
    private $user_id = -1;
    private $username = "";
    private $is_admin = 0;
    private $rep = 0;
    private $date_created = 01-01-1970;
    private $deleted = 0;

    function WithId($database, $userId) {
        // Query with UserID
        $mysqlUser = $database->QueryDatabase("SELECT 1 FROM users WHERE user_id='$userId'");

        // If Query Returned
        if($mysqlUser){
            // Get Assoc
            $mysqlUser = $mysqlUser -> fetch_assoc();

            // Test Assoc
            if($mysqlUser["user_id"] > -1){
                // Set UserID in OBJ
                $this->user_id = $mysqlUser["user_id"];
                
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

    function WithData($database, $postUsername, $postPassword) {
        // Strip Posts
        $postUsername = strip_tags($postUsername);
        $postPassword = strip_tags($postPassword);

        // Escape String
        $username = $database->EscapeString($postUsername);
        $password = $database->EscapeString($postPassword);

        // Hash Password
        $password = password_hash($password, PASSWORD_BCRYPT);

        // Query with Username
        $mysqlUser = $database->QueryDatabase("SELECT * FROM users WHERE username='$username'");

        // If Query Returned
        if($mysqlUser){
            // Get Assoc
            $mysqlUser = $mysqlUser->fetch_assoc();

            // Test Assoc
            if($mysqlUser["user_id"] > -1){
                // Check Password
                if(password_verify($password, $mysqlUser["pass"])){
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

    function AddUser($database, $postUsername, $postPassword) {
        // Get + Strip Post Details
        $postUsername = strip_tags($_POST['FieldUsername']);
        $postPassword = strip_tags($_POST['FieldPassword']);

        // Pass Data and Escape SQL to prevent injection
        $username = mysqli_real_escape_string($mysqlConnection, $postUsername);
        $password = mysqli_real_escape_string($mysqlConnection, password_hash($postPassword, PASSWORD_BCRYPT));

        // Hash Password
        $password = password_hash($password, PASSWORD_BCRYPT);

        // Query with Username
        $mysqlUserTest = $database->QueryDatabase("SELECT * FROM users WHERE username='$username'");

        // If Query Returned No Users
        if(mysqli_num_rows($mysqlUserTest) == 0){
            // Get Date
            $currentDate = date("Y/m/d");
                    
            // Make User Query
            $mysqlUserCreate = $database->QueryDatabase("INSERT INTO users (username, pass, date_created) VALUES ('$username', '$password', '$currentDate')");

            // Attempt Query Use
            if($mysqlUserCreate){
                // Test user via Query
                $mysqlUser = $this->WithData($database, $postUsername, $postPassword);
                
                // If all good
                if($mysqlUser->GetStatus() < 400){
                    // Start Session
                    $database->StartSession($mysqlUser->GetData()->user_id);
                }
                // Unable to Verify User Creation
                else{
                    // Set Status: Bad Request
                    $this->status = 400;
                }
            }
            // Unable to Query 
            else{
                // Set Status: Bad Request
                $this->status = 400;
            }
        }
        else{
            // User Exists
            $this->status = 409;
        }
    }

    function GetData(){
        // Declare User Data Array
        $userData = array();

        // Push Array Data
        array_push($userData, $this->user_id);
        array_push($userData, $this->username);
        array_push($userData, $this->is_admin);
        array_push($userData, $this->rep);
        array_push($userData, $this->date_created);
        array_push($userData, $this->deleted);

        // Return Array
        return($userData);
    }

    function GetStatus(){
        // Return Status
        return($this->status);
    }

    function __destruct(){
        // Reset Vars
        $this->status = 400;
        $this->user_id = -1;
        $this->username = "";
        $this->is_admin = 0;
        $this->rep = 0;
        $this->date_created = 01-01-1970;
        $this->deleted = 0;
    }
}

?>