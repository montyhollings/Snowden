<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="?location=frontpage">
          <img src="logo.png" class="img-fluid" style="max-height: 80px;">
      </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link " href="?location=frontpage">Frontpage </a>
      </li>
      <li>
        <a class="nav-item nav-link ml-auto text-dark" href="?location=topics">Topics</a>
        
      </li>
                  
    </ul>
    <ul class="navbar-nav ml-auto">
      <li>
        <a class="nav-item nav-link text-dark" href="?location=stories">Your Stories</a>
      </li>
      <li class="ml-auto">
        <?php if (isset($_SESSION['LOGGED-IN']) && $_SESSION['LOGGED-IN'] == true): ?>
          <div class="dropdown">
            <button class="btn nav-item nav-link text-dark" id="dropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Account
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownButton">
              <a class="nav-item nav-link text-dark" href="?location=auth/account">Profile</a>
              <a class="nav-item nav-link text-dark" href="?location=auth/logout">Logout</a>
            </div>
          </div>
        <?php else: ?>
          <button type="button" class="btn nav-item nav-link text-dark" data-toggle="modal" data-target="#LoginModal">
            Login
          </button>
          <!--- a class="nav-item nav-link text-dark" href="?location=auth/login">Login</a --->
        <?php endif; ?>
      </li>
    </ul>
    
  </div>
</nav>

<!-- Login Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LoginModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="?location=auth/login" method="POST">
        <div class="modal-body">
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
        <div class="modal-footer">
          <p>Don't already have an account? <a href="?location=auth/register">Sign up</a>.</p>
          <button type="submit" class=" float-right btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>