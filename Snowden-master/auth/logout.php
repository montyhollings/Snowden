<?php

    // Remove Session Credentials
    $_SESSION["USERNAME"] = null;
    $_SESSION["LOGGED-IN"] = false;
    $_SESSION['ADMIN'] = 0;

    // Kill Session
    session_destroy();

    //

?>

<h1 class="m-auto text-center text-info">
    You have logged out!
</h1>

<?php sleep(10); header('Refresh: 10; URL=?location=auth/account'); ?>