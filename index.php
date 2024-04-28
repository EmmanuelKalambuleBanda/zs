<?php
ob_start();
require_once('includes/load.php');
if ($session->isUserLoggedIn(true)) {
  redirect('home.php', false);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>
    ZAITHWA SHOP Login
  </title>

  <!-- Custom fonts for this template-->
  <link href="libs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="libs/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="libs/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="libs/css/main.css" /> -->
</head>
<div class="row justify-content-center">
  <div class="col-xl-10 col-lg-12 col-md-9">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block"> <img src="libs/images/zs.png"></img></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome to ZAITHWA SHOP</h1>
              </div>
              <?php echo display_msg($msg); ?>
              <form method="post" action="auth.php" class="user">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="username" placeholder="username" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>