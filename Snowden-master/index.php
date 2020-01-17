<?php 
    include_once('env.php');
    include_once('scripts/connection.php');
    include_once('scripts/user.php');

    $connection = new Database($SNOWDEN_IP, $SNOWDEN_DB, $SNOWDEN_USER, $SNOWDEN_PASS);

    if($connection->GetSession() != ''){
        $user = new User;
        $user->WithId($connection, $connection->GetSession());
        $userStatus = $user->GetStatus();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!--- META + Title --->
        <title>Snowden</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--- Styles --->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body style="bg-light">
        <!--- Header --->
        <header>
            <?php include('navbar.php'); ?>
        </header>
        <!--- Main --->
        <main>
            <?php
                if(isset($_GET['location']) && file_exists($_GET['location'] . '.php')){
                    include(strip_tags($_GET['location']) . '.php');
                }
                else{
                    include('frontpage.php');
                }
            ?>
        </main>
        <!--- Footer --->
        <footer>
            <?php include('footer.php'); ?>
            <!--- Scripts (JQuery, BootStrap, Popper) --->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </footer>
    </body>
</html>