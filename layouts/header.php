<?php $user = current_user(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>
    <?php if (!empty($page_title))
      echo remove_junk($page_title);
    elseif (!empty($user))
      echo ucfirst($user['name']);
    else echo "ZAITHWA SHOP"; ?>
  </title>

  <!-- Custom fonts for this template-->
  <link href="libs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="libs/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="libs/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="libs/css/main.css" /> -->
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php if ($session->isUserLoggedIn(true)) : ?>
      <?php if ($user['user_level'] === '1') : ?>
        <!-- admin menu -->
        <?php include_once('admin_menu.php'); ?>
      <?php elseif ($user['user_level'] === '2') : ?>
        <!-- Special user -->
        <?php include_once('special_menu.php'); ?>
      <?php elseif ($user['user_level'] === '3') : ?>
        <!-- User menu -->
        <?php include_once('user_menu.php'); ?>
      <?php endif; ?>
      <!-- End of Sidebar -->
    <?php endif; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user['name']; ?></span>
                <img class="img-profile rounded-circle" src="uploads/users/<?php echo $user['image']; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php?id=<?php echo (int)$user['id']; ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="edit_account.php" title="edit account">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>

            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->