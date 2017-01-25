<?php
include("connection.php");
$nom="";
if(isset($_GET['nom']))
		$nom=$_GET['nom'];
?>
<script>
function redir(){
	confirm('Ce role a bien ete modifie');
	window.location  = "index.php";
}
</script>
<!DOCTYPE HTML>
<head>
	<meta charset = "utf-8">
	<title>Formulaire : </title>
</head>
<body>
<fieldset>
<legend>Modifier un rôle</legend>
<form name = "Formulaire" method = "post">
<label>ID role : <?php echo idrole($nom); ?>  &nbsp </label>
<label for = "name">Nom role : </label><input type = "text" name = "name" size = "40" value="<?php echo $nom ?>">
</fieldset>
<input type = "submit" size = "10" name = "EN">
<input type = "button" size = "10" name = "Retour" value="Retour" Onclick="javascript:location.href='index.php'" ></br></hr>
</form></body>
</html>

<?php

 if(isset($_POST['EN'])){
	 
	if(!empty($_POST['name']))
		$name = $_POST['name'];
	
$db_username = "root";
$db_password = "";
$db = $db = "mysql:dbname=phalcon-td0;host=localhost";
$conn = ConnecterPDO($db,$db_username,$db_password);
$id=idrole($nom);
$req = "update role set name='$name'where id=$id";
$tab = LireDonneesPDO1($conn,$req);
echo "<script>redir()</script>";
}
 
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
 
	 
	 
	 
	 
	 
