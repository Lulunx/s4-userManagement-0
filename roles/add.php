<?php
include("connection.php");
?>
<!DOCTYPE HTML>
<head>
	<meta charset = "utf-8">
	<title>Formulaire : </title>
</head>
<body>
<fieldset>
<legend>Ajouter un rôle</legend>
<form name = "Formulaire" method = "post">
<label for = "id">ID role : </label><input type = "text" name = "id" size = "40">&nbsp
<label for = "name">Nom role : </label><input type = "text" name = "name" size = "40">
</fieldset>
<input type = "submit" size = "10" name = "EN">
<input type = "button" size = "10" name = "Retour" value="Retour" Onclick="javascript:location.href='index.php'" ></br></hr>
</form></body>
</html>

<?php

 if(isset($_POST['EN'])){
	 
	if(!empty($_POST['id']))
		$id = $_POST['id'];
	if(!empty($_POST['name']))
		$name = $_POST['name'];
	
$db_username = "root";
$db_password = "";
$db = $db = "mysql:dbname=phalcon-td0;host=localhost";
$conn = ConnecterPDO($db,$db_username,$db_password);
$req = "insert into role(id,name) values ('$id','$name')";
$tab = LireDonneesPDO1($conn,$req);
	 
 }
	 
	 
	 
	 
	 
