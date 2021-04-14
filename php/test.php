<?php
session_start();
include "db.php";
include "indexC.php";
$k = "Am.kIpSFXGdBk";
$s = "Neekendukra";
$x = crypt($s,"Amazon");
echo $x;
?>