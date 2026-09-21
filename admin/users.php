<?php require '../config.php'; if(!is_logged()) header('Location: /lftms_full/login.php'); $u=current_user(); if($u['role']!='admin'){ echo 'Access denied'; exit; }
if(isset($_GET['del'])){ $pdo->prepare('DELETE FROM users WHERE id=?')->execute([intval($_GET['del'])]); header('Location: users.php'); }
$rows = $pdo->query('SELECT id,name,email,role,created_at FROM users')->fetchAll(); include '../inc/header.php'; ?>
<h3>Users</h3>
<table class="table"><tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Action</th></tr>
<?php foreach($rows as $r): ?><tr><td><?php echo $r['id'];?></td><td><?php echo esc($r['name']);?></td><td><?php echo esc($r['email']);?></td><td><?php echo $r['role'];?></td><td><a href="?del=<?php echo $r['id'];?>" class="btn btn-sm btn-danger">Delete</a></td></tr><?php endforeach; ?></table>
<?php include '../inc/footer.php'; ?>