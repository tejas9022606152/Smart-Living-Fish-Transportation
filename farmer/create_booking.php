<?php require '../config.php'; if(!is_logged()) header('Location: /lftms_full/login.php'); $u=current_user(); if($u['role']!='farmer'){ echo 'Access denied'; exit; }
$species = $pdo->query('SELECT * FROM species')->fetchAll(); if($_SERVER['REQUEST_METHOD']=='POST'){ $stmt=$pdo->prepare('INSERT INTO bookings (farmer_id,species_id,quantity_kg,source,destination,status) VALUES(?,?,?,?,?,?)'); $stmt->execute([$u['id'],intval($_POST['species_id']),intval($_POST['quantity']),$_POST['source'],$_POST['destination'],'pending']); header('Location: my_bookings.php'); exit; }
include '../inc/header.php'; ?>
<h3>Create Booking</h3>
<form method="post"><div class="mb-3"><select name="species_id" class="form-select"><?php foreach($species as $s) echo "<option value='{$s['id']}'>".esc($s['name'])."</option>"; ?></select></div>
<div class="mb-3"><input class="form-control" name="quantity" placeholder="Quantity (kg)" required></div>
<div class="mb-3"><input class="form-control" name="source" placeholder="Source"></div>
<div class="mb-3"><input class="form-control" name="destination" placeholder="Destination"></div>
<button class="btn btn-success">Book</button></form>
<?php include '../inc/footer.php'; ?>