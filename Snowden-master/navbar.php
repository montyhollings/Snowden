<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
                <img src="/johng/jg_monty/Snowden-master/logo.png" class="img-fluid" style="max-height: 80px;">
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link " href="/johng/jg_monty/Snowden-master/index.php">Frontpage </a>
            </li>
            <li>
              <a class="nav-item nav-link ml-auto text-dark" href="#">Topics</a>
              
            </li>
                        
          </ul>
          <ul class="navbar-nav ml-auto">
            <li>
              <a class="nav-item nav-link text-dark" href="#">Your Stories</a>
            </li>
            <li class="ml-auto">

            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
              <a class="nav-item nav-link text-dark" href="/johng/jg_monty/Snowden-master/auth/account.php">Your Profile</a>
            <?php else: ?>
              <a class="nav-item nav-link text-dark" href="/johng/jg_monty/Snowden-master/auth/account.php">Login</a>
            <?php endif; ?>
            </li>
          </ul>
          
        </div>
      </nav>