<?php require 'config.php'; if($_SERVER['REQUEST_METHOD']=='POST'){
  $name = $_POST['name']; $email = $_POST['email']; $password = $_POST['password']; $role = $_POST['role'];
  if($name && $email && $password && $role){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO users (name,email,password,role) VALUES (?,?,?,?)');
    $stmt->execute([$name,$email,$hash,$role]);
    header('Location: login.php'); exit;
  }
}
include 'inc/header.php'; ?>
<h3>Register</h3>
<form method="post">
  <div class="mb-3"><input class="form-control" name="name" placeholder="Name" required></div>
  <div class="mb-3"><input class="form-control" name="email" placeholder="Email" type="email" required></div>
  <div class="mb-3"><input class="form-control" name="password" placeholder="Password" type="password" required></div>
  <div class="mb-3">
    <select name="role" class="form-select" required>
      <option value="farmer">Farmer</option>
      <option value="transporter">Transporter</option>
    </select>
  </div>
  <button class="btn btn-primary">Register</button>
</form>
<?php include 'inc/footer.php'; ?>