<?php 
  if(isset($_POST['FieldUsername']) && isset($_POST['FieldPassword'])){
    $user = new User;
    $user->WithData($connection, $_POST['FieldUsername'], $_POST['FieldPassword']);
    $userStatus = $user->GetStatus();
  }
?>

<div class="container my-5">
  <div class="row">
    <div class="col-4">
      
    </div>
    <div class="col-4">
      <div class="card w-100">
        <?php if(isset($userStatus)): ?>
          <?php 
            switch($userStatus){
              case(200): 
                $msgClass = 'text-primary';
                $msgText = 'Logged In!';
                break;

              case(400): 
                $msgClass = 'text-danger';
                $msgText = 'Login Error';
                break;

              default:
                $msgClass = 'text-warning';
                $msgText = 'Incorrect Details';
            }
          ?>
          <div class="card-header <?php echo($msgClass); ?> text-center">
            <?php echo($msgText); ?>
          </div>
        <?php endif; ?>
        
        <div class="card-header text-center">
          Login
        </div>
        <form action="#" method="POST">
          <div class="card-body">
              <div class="form-group">
                <label for="FieldUsername">Username</label>
                <input required type="text" class="form-control" name="FieldUsername" aria-describedby="Username" placeholder="Enter Username">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="FieldPassword">Password</label>
                <input required type="password" class="form-control" name="FieldPassword" placeholder="Password">
              </div> 
          </div>
          <div class="card-footer">
            <button type="submit" class=" float-right btn btn-primary">Submit</button>
            <div class="container signin">
              <p>Don't already have an account? <a href="?location=auth/register">Sign up</a>.</p>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-4">

    </div>
  </div>
</div>