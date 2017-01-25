<script>
function redir(){
	confirm('Ce role a bien ete supprime');
	window.location  = "index.php";
}
function redirpassuppr(){
	confirm("Ce role n'a pas ete supprime car il est attribue a un ou plusieurs utilisateurs");
	window.location  = "index.php";
}
</script>
<?php
function idrole($nom){
$db_username = "root";
$db_password = "";
$db = $db = "mysql:dbname=phalcon-td0;host=localhost";
$conn = ConnecterPDO($db,$db_username,$db_password);
$req="select id from role where name = '$nom'";
$tab= LireDonneesPDO1($conn, $req);
foreach($tab as $ligne)
  {
    foreach($ligne as $cle =>$valeur)
		return $valeur;
 }
}

	include("connection.php");
	if(isset($_GET['nom'])){
		$name=$_GET["nom"];
		$db_username = "root";
		$db_password = "";
		$db = $db = "mysql:dbname=phalcon-td0;host=localhost";
		$conn = ConnecterPDO($db,$db_username,$db_password);
		$id=idrole($name);
		$verif="select count(idrole) from user where idrole=$id";
		$tab2 = LireDonneesPDO1($conn,$verif);
		foreach($tab2 as $ligne)
		{
			foreach($ligne as $cle =>$valeur)
				$val=$valeur;
		}
		if($val==0){
			$sql = "delete from role where name = '$name'";
			$tab = LireDonneesPDO1($conn,$sql);
			echo "<script>redir()</script>";
		}
		else
			echo "<script>redirpassuppr()</script>";
		
	}
	
?>
