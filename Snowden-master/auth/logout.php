<?php

    // Remove Session Credentials
    $_SESSION["ID"] = null;
    $_SESSION["USERNAME"] = null;
    $_SESSION["LOGGED-IN"] = false;
    $_SESSION['ADMIN'] = 0;

    // Kill Session
    session_destroy();

?>

<h1 class="m-auto text-center text-info">
    You have logged out!
</h1>

<?php header('Refresh: 1.5; URL=?location=frontpage'); ?>