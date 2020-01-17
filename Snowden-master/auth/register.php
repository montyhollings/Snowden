<?php 
  if(isset($_POST['FieldUsername']) && isset($_POST['FieldPassword'])){
    $user = new User;
    $user->AddUser($connection, $_POST['FieldUsername'], $_POST['FieldPassword']);
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
                $msgText = 'Registered!';
                break;

              default:
                $msgClass = 'text-danger';
                $msgText = 'Creation Error';
            }
          ?>
          <div class="card-header <?php echo($msgClass); ?> text-center">
            <?php echo($msgText); ?>
          </div>
        <?php endif; ?>
        
        <div class="card-header text-center">
          Register
        </div>
        <form action="#" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="FieldUsername">Username</label>
              <input required type="text" class="form-control" name="FieldUsername" aria-describedby="Username" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="FieldPassword">Password</label>
              <input required type="password" class="form-control" name="FieldPassword" placeholder="Password">
            </div>   
          </div>
          <div class="card-footer">
            <button type="submit" class=" float-right btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-4">

    </div>
  </div>
</div>