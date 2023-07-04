<?php
include ('header.php');
include ('footer.php');

$latitude1 = 43.610769;
$longitude1 = 3.876716;
$latitude2 = 48.856614;
$longitude2 = 2.352222;

$angularDistance = acos((sin($latitude1)*sin($latitude2))+(cos($latitude1)*cos($latitude2)*cos($longitude2-$longitude1)));
$distance = $angularDistance * 6378137/1000;
?>
<p><?= $distance." km";?></p>


