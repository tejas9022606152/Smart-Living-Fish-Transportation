<?php require '../config.php'; if(!is_logged()) header('Location: /lftms_full/login.php'); $u=current_user(); if($u['role']!='transporter'){ echo 'Access denied'; exit; }
$id=intval($_GET['id']); $rows = $pdo->prepare('SELECT * FROM trip_positions WHERE booking_id=? ORDER BY id ASC'); $rows->execute([$id]); $rows=$rows->fetchAll(); include '../inc/header.php'; ?>
<h3>Trip Positions</h3>
<div id="map" style="height:400px"></div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script>
var map = L.map('map').setView([18.5204,73.8567],10);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{maxZoom:18}).addTo(map);
var latlngs = [
<?php foreach($rows as $r){ echo "[{$r['lat']},{$r['lng']}],"; } ?>
];
if(latlngs.length>0){ var poly = L.polyline(latlngs).addTo(map); map.fitBounds(poly.getBounds()); }
</script>
<?php include '../inc/footer.php'; ?>