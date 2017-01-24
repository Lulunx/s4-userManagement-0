<script>
function redir(){
	confirm('Ce role a bien ete supprime');
	window.location  = "http://localhost/s4-userManagement-0/roles/index.php";
}
</script>
<?php
	include("connection.php");
	$db_username = "root";
	$db_password = "";
	$db = $db = "mysql:dbname=phalcon-td0;host=localhost";
	$conn = ConnecterPDO($db,$db_username,$db_password);
	$name=$_GET["nom"];
	$sql = "delete from role where name = '$name'";
	$tab = LireDonneesPDO1($conn,$sql);
	echo "<script>redir()</script>"
?>
