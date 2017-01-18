<?php
include ("conn.php");

$conn=conn();
$sql = "select * from role";
$donnee = LireDonneesPDO1($conn,$sql);
AfficherDonnee($donnee);
?>