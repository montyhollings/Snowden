<?php if (isset($_SESSION['LOGGED-IN']) && $_SESSION['LOGGED-IN'] == true): ?>
  <p>My Account</p>
<?php else: ?>
    <?php echo $_SESSION['LOGGED-IN']; //header("Location: ?location=auth/login"); ?>
<?php endif; ?>