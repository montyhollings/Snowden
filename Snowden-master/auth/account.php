<?php if (isset($_SESSION['LOGGED-IN']) && $_SESSION['LOGGED-IN'] == true): ?>
  <div class="container my-5">
    <div class="row">
      <div class="col-4">

      </div>
      <div class="col-4">
        <div class="card w-100">
          <div class="card-header text-center">

           <p class="text-secondary"><?php echo $_SESSION['USERNAME']; ?></p>
          </div>
          <div class="card-body">
            <img class="w-100" src="https://i.dailymail.co.uk/i/pix/2012/12/16/article-2249044-1689BF2B000005DC-185_634x402.jpg"/>
          </div>
          <div class="card-footer w-100 mx-auto text-center row">
            <a class="text-danger col-6" href="?location=auth/logout"> Logout? </a>
            <a class="text-danger col-6" href="?location=auth/delete"> Delete? </a>
          </div>
        </div>
      </div>
      <div class="col-4">

      </div>
    </div>
  </div>
<?php else: ?>
    <?php header("Location: ?location=auth/login"); ?>
<?php endif; ?>