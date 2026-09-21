<?php require '../config.php'; if(!is_logged()) header('Location: /lftms_full/login.php'); $u=current_user(); if($u['role']!='transporter'){ echo 'Access denied'; exit; }
$id = intval($_GET['id']); $pdo->prepare("UPDATE bookings SET status='in_transit', start_time=NOW() WHERE id=?")->execute([$id]);
// insert initial position
$pdo->prepare('INSERT INTO trip_positions (booking_id,lat,lng) VALUES (?,?,?)')->execute([$id,18.5204 + rand(-100,100)/10000,73.8567 + rand(-100,100)/10000]);
header('Location: active_trips.php'); exit; ?>