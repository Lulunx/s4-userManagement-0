<?php
include ("conn.php");

$conn=conn();
$sql = "select name, count(firstname) from role join user on (role.id=user.idrole) group by name";
$donnee = LireDonneesPDO1($conn,$sql);
AfficherDonnee($donnee);
?>