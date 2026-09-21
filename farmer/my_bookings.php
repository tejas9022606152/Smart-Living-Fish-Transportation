<?php require '../config.php'; if(!is_logged()) header('Location: /lftms_full/login.php'); $u=current_user(); if($u['role']!='farmer'){ echo 'Access denied'; exit; }
$rows=$pdo->prepare('SELECT b.*, s.name as species_name, v.vehicle_no FROM bookings b LEFT JOIN species s ON b.species_id=s.id LEFT JOIN vehicles v ON b.vehicle_id=v.id WHERE b.farmer_id=? ORDER BY b.created_at DESC'); $rows->execute([$u['id']]); $rows=$rows->fetchAll(); include '../inc/header.php'; ?>
<h3>My Bookings</h3>
<table class="table"><tr><th>ID</th><th>Species</th><th>Qty</th><th>Status</th><th>Action</th></tr>
<?php foreach($rows as $r): ?><tr><td><?php echo $r['id'];?></td><td><?php echo esc($r['species_name']);?></td><td><?php echo $r['quantity_kg'];?></td><td><?php echo $r['status'];?></td><td><?php if($r['status']=='pending') echo "<a class='btn btn-sm btn-secondary' href='/lftms_full/admin/bookings.php'>Waiting for admin</a>"; ?></td></tr><?php endforeach; ?></table>
<?php include '../inc/footer.php'; ?>