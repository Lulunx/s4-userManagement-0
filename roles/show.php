<script>	
function redir(){
	 window.location  = "http://localhost/s4-userManagement-0/roles/index.php;
}
</script>
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
<legend>Informations sur le rôle</legend>
<form name = "Formulaire" method = "post">
<?php
echo "<label for = \"role\">Role: </label>";
echo "<select name = \"role\" id =\"role\">";
echo "<option value =null>----</option>";
$db_username = "root";
$db_password = "";
$db = $db = "mysql:dbname=phalcon-td0;host=localhost";
$conn = ConnecterPDO($db,$db_username,$db_password);
$req = "select name from role";
$tab = LireDonneesPDO1($conn,$req);
foreach ($tab as $key){
	foreach ($key as $key2=>$value) {
	echo '<option value ='.$value.'>'.$value.'</option>';}
}
echo "</select></br>";
?>
</fieldset>
<input type = "submit" size = "10" name = "EN">
<input type = "button" size = "10" name = "Retour" value="Retour" Onclick="javascript:location.href='index.php'" ></br></hr>
</form></body>
</html>


<?php

 if(isset($_POST['EN'])){

if (!empty($_POST['role'])){
	$role = $_POST['role'];
}
$req2 = "select name, id from role where name = '$role'";
$tab2 = LireDonneesPDO1($conn,$req2);
AfficherDonnee2($tab2);

 }


?>