<?php 
  function LoginUser($mysqlConnection){
    if(isset($_POST['FieldUsername']) && isset($_POST['FieldPassword'])){
      ?><div class="card-header bg-dark"><?php

      // Get + Strip Post Details
      $postUsername = strip_tags($_POST['FieldUsername']);
      $postPassword = strip_tags($_POST['FieldPassword']);

      // Pass Data and Escape SQL to prevent injection
      $username = mysqli_real_escape_string($mysqlConnection, $postUsername);
      $password = mysqli_real_escape_string($mysqlConnection, $postPassword); //password_hash($postPassword, PASSWORD_BCRYPT));

      // Make Get User
      $mysqlUserName = mysqli_query($mysqlConnection, "SELECT * FROM users WHERE username='$username'");

      // Attempt Query Use
      try {
        // Check Correct Username
        if(mysqli_num_rows($mysqlUserName) > 0){
          // Get Assoc User from Username
          $mysqlUser = $mysqlUserName -> fetch_assoc();

          // Check Correct Password
          if($password == $mysqlUser["pass"]){//password_verify($password, $mysqlUser["pass"])){ 
              // Start Session
              session_start();

              // Session Store Credentials
              $_SESSION["USERNAME"] = $postUsername;
              $_SESSION["LOGGED-IN"] = true;
              $_SESSION['ADMIN'] = 1;

              ?><h1 class="m-auto text-center text-info"> Connected </h1><?php
          }
          // Incorrect Password
          else{
            ?><h1 class="m-auto text-center text-warning"> Incorrect Details </h1><?php
          }
        }
        //Incorrect Username
        else{
            ?><h1 class="m-auto text-center text-warning"> Incorrect Details </h1><?php
        }
      }
      // Not able to use queries
      catch(Exception $Except) {
          ?><h1> Could not connect </h1><?php
      }

      ?></div><?php
    }
  }
?>

<div class="container my-5">
  <div class="row">
    <div class="col-4">
      
    </div>
    <div class="col-4">
      <div class="card w-100">
        <?php LoginUser($mysqlConnection); // Call LoginUser Function ?>
        <div class="card-header text-center">
          Login
        </div>
        <div class="card-body">
          <form action="#" method="POST">
            <div class="form-group">
              <label for="FieldUsername">Username</label>
              <input type="text" class="form-control" name="FieldUsername" aria-describedby="Username" placeholder="Enter Username">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="FieldPassword">Password</label>
              <input type="password" class="form-control" name="FieldPassword" placeholder="Password">
            </div>   
          </div>
          <div class="card-footer">
            <button type="submit" class=" float-right btn btn-primary">Submit</button>
            <div class="container signin">
              <p>Don't already have an account? <a href="?location=register">Sign up</a>.</p>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-4">

    </div>
  </div>
</div>