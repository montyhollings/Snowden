<?php 
    // If Logged In
    if (isset($_SESSION['LOGGED-IN']) && $_SESSION['LOGGED-IN'] == true){

        // Get Session ID
        $sessionUser = $_SESSION['USER-ID'];

        // Make Get User Via ID
        $mysqlUserName = mysqli_query($mysqlConnection, "SELECT * FROM users WHERE user_id='$sessionUser'");

        // Attempt Query Use
        try {
            // Check Correct Username
            if(mysqli_num_rows($mysqlUserName) > 0){
                // Account Deleted
                mysqli_query($mysqlConnection, "UPDATE users SET 'delete'='1' WHERE user_id='$sessionUser'");

                ?><h1 class="m-auto text-center text-info"> Deleted </h1><?php
            }
        }
        // Not able to use queries
        catch(Exception $Except) {
            ?><h1> Could not connect </h1><?php
        }

        // Remove Session Credentials
        $_SESSION["ID"] = null;
        $_SESSION["USERNAME"] = null;
        $_SESSION["LOGGED-IN"] = false;
        $_SESSION['ADMIN'] = 0;

        // Kill Session
        session_destroy();
    }
    else {
        header("Location: ?location=auth/login");
    }
?>

<h1 class="m-auto text-center text-info">
    You have deleted your account!
</h1>

<?php header('Refresh: 3; URL=?location=frontpage'); ?>