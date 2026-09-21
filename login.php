<?php require 'config.php'; $err=''; if($_SERVER['REQUEST_METHOD']=='POST'){
  $email=$_POST['email']; $pass=$_POST['password'];
  $stmt=$pdo->prepare('SELECT * FROM users WHERE email=?'); $stmt->execute([$email]); $u=$stmt->fetch();
  if($u && password_verify($pass,$u['password'])){ $_SESSION['user_id']=$u['id']; header('Location: index.php'); exit; } else { $err='Invalid creds'; }
}
include 'inc/header.php'; ?>
<h3>Login</h3>
<?php if($err) echo "<div class='alert alert-danger'>".esc($err)."</div>"; ?>
<form method="post">
  <div class="mb-3"><input class="form-control" name="email" placeholder="Email" type="email" required></div>
  <div class="mb-3"><input class="form-control" name="password" placeholder="Password" type="password" required></div>
  <button class="btn btn-primary">Login</button>
</form>
<?php include 'inc/footer.php'; ?>