<?php 

    // Make Connection String
    $mysqlConnection = @mysqli_connect("localhost", "jg_luke", "123abc", "jg_luke")
        or die ("<h1> Sorry- Could not connect to the MySQL Database at this time. </h1> <a href='http://www.google.com'> <button><h1> Leave </h1></button> </a>");	;

    // Get + Strip Post Details
    $postUsername = strip_tags($_POST['FieldUsername']);
    $postPassword = strip_tags($_POST['FieldPassword']);

    // Pass Data and Escape SQL to prevent injection
    $username = mysqli_real_escape_string($mysqlConnection, $postUsername);
    $password = mysqli_real_escape_string($mysqlConnection, password_hash($postPassword, PASSWORD_BCRYPT));

    // Make User Check
    $mysqlUserCheck = mysqli_query($mysqlConnection, "SELECT * FROM users WHERE username='$username'");

    // Attempt Query Use
    try {
        // Check Correct Username
        if(mysqli_num_rows($mysqlUserCheck) > 0){

            // Check Correct Password
            if(password_verify($password, $hash)){ 

                // Start Session
                session_start();

                // Session Store Credentials
                $_SESSION["USERNAME"] = $postUsername;
                $_SESSION["LOGGED-IN"] = true;
                $_SESSION['ADMIN'] = 1;

                ?><h1> Connected </h1><?php

                // End PHP Connection
                die();
            }
            // Incorrect Password
            else{

            }
        }
        //Incorrect Username
        else{
            ?><h1> Incorrect Details </h1><?php
        }
    }
    // Not able to use queries
    catch(Exception $Except) {
        ?><h1> Could not connect </h1><?php
    }

    // End PHP Connection
    die();
?>