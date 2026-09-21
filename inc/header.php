<?php require_once __DIR__.'/../config.php'; ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>LFTMS</title>
  <link rel="stylesheet" href="/lftms_full/assets/bootstrap.min.css">
  <style>body{padding-top:70px;}</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/lftms_full/">LFTMS</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <?php if(is_logged()): $u=current_user(); ?>
          <li class="nav-item"><a class="nav-link" href="/lftms_full/index.php">Home</a></li>
          <?php if($u['role']=='admin'): ?><li class="nav-item"><a class='nav-link' href='/lftms_full/admin/dashboard.php'>Admin</a></li><?php endif; ?>
          <?php if($u['role']=='farmer'): ?><li class="nav-item"><a class='nav-link' href='/lftms_full/farmer/dashboard.php'>Farmer</a></li><?php endif; ?>
          <?php if($u['role']=='transporter'): ?><li class="nav-item"><a class='nav-link' href='/lftms_full/transporter/dashboard.php'>Transporter</a></li><?php endif; ?>
          <li class="nav-item"><a class='nav-link' href='/lftms_full/logout.php'>Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class='nav-link' href='/lftms_full/login.php'>Login</a></li>
          <li class="nav-item"><a class='nav-link' href='/lftms_full/register.php'>Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
