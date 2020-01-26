<?php 

$lat = htmlentities($_POST['lat']);
$lon = htmlentities($_POST['lon']);

$map = shell_exec('LAT_LON_to_Nearby_Cyclones.py ' . $lat . ' ' . $lon);

include $lat . $lon .'.html';
?>