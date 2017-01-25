<?php
include("connection.php");
$id="";

if(isset($_GET['id'])){
	$id=$_GET['id'];
	$infos=infosuser($id);
}
		
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
<legend>Modifier un utilisateur</legend>
<form name = "Formulaire" method = "post">
<label>ID User : <?php echo $id ?>  &nbsp </label></br>
<label for = "name">Login User : </label><input type = "text" name = "login" size = "40" value="<?php echo $infos[0]['login'] ?>"></br>
<label for = "name">Mdp User : </label><input type = "text" name = "password" size = "40" value="<?php echo $infos[0]['password'] ?>"></br>
<label for = "name">Nom User : </label><input type = "text" name = "lastname" size = "40" value="<?php echo $infos[0]['firstname'] ?>"></br>
<label for = "name">Prénom User : </label><input type = "text" name = "firstname" size = "40" value="<?php echo $infos[0]['lastname']?>"></br>
<label for = "name">Mail User : </label><input type = "text" name = "mail" size = "40" value="<?php echo $infos[0]['email'] ?>"></br>
<label for = "name">Image User : </label><input type = "text" name = "image" size = "40" value="<?php echo $infos[0]['image'] ?>"></br>
<label for = "name">Role User : </label><input type = "text" name = "role" size = "40" value="<?php echo $infos[0]['idrole'] ?>"></br>

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
$req = "update role set name='$name'where id=$id";
$tab = LireDonneesPDO1($conn,$req);
echo "<script>redir()</script>";
}
 
function infosuser($id){
$db_username = "root";
$db_password = "";
$db = $db = "mysql:dbname=phalcon-td0;host=localhost";
$conn = ConnecterPDO($db,$db_username,$db_password);
$req="select login, password, firstname, lastname, email, image, idrole from user where id = $id";
$tab= LireDonneesPDO1($conn, $req);
return $tab;
}
 
	 
	 
	 
	 
	 
