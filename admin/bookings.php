<?php require '../config.php'; if(!is_logged()) header('Location: /lftms_full/login.php'); $u=current_user(); if($u['role']!='admin'){ echo 'Access denied'; exit; }
$rows=$pdo->query('SELECT b.*, u.name as farmer_name, s.name as species_name, v.vehicle_no FROM bookings b LEFT JOIN users u ON b.farmer_id=u.id LEFT JOIN species s ON b.species_id=s.id LEFT JOIN vehicles v ON b.vehicle_id=v.id ORDER BY b.created_at DESC')->fetchAll(); include '../inc/header.php'; ?>
<h3>Bookings</h3>
<table class="table"><tr><th>ID</th><th>Farmer</th><th>Species</th><th>Qty</th><th>From</th><th>To</th><th>Status</th></tr>
<?php foreach($rows as $r): ?><tr><td><?php echo $r['id'];?></td><td><?php echo esc($r['farmer_name']);?></td><td><?php echo esc($r['species_name']);?></td><td><?php echo $r['quantity_kg'];?></td><td><?php echo esc($r['source']);?></td><td><?php echo esc($r['destination']);?></td><td><?php echo $r['status'];?></td></tr><?php endforeach; ?></table>
<?php include '../inc/footer.php'; ?>