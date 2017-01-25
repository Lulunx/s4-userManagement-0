<script>
function redir(){
	confirm('Cette user a bien ete supprime');
	window.location  = "index.php";
}
</script>
<?php

include("connection.php");
if(isset($_GET['id'])){
	$id=$_GET["id"];
	$db_username = "root";
	$db_password = "";
	$db = $db = "mysql:dbname=phalcon-td0;host=localhost";
	$conn = ConnecterPDO($db,$db_username,$db_password);
	$sql = "delete from user where login = '$id'";
	$tab = LireDonneesPDO1($conn,$sql);
	echo "<script>redir()</script>";	
}
	
?>
