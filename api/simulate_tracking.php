<?php require '../config.php';
$stmt = $pdo->query("SELECT id FROM bookings WHERE status='in_transit'");
while($b=$stmt->fetch()){
  $id = $b['id'];
  $s2 = $pdo->prepare('SELECT lat,lng FROM trip_positions WHERE booking_id=? ORDER BY id DESC LIMIT 1'); $s2->execute([$id]); $pos=$s2->fetch();
  if(!$pos){ $lat=18.5204; $lng=73.8567; } else { $lat = $pos['lat'] + (rand(-50,50)/10000); $lng = $pos['lng'] + (rand(-50,50)/10000); }
  $pdo->prepare('INSERT INTO trip_positions (booking_id,lat,lng) VALUES (?,?,?)')->execute([$id,$lat,$lng]);
}
echo 'OK'; ?>