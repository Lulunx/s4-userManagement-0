<?php
include("connection.php");
?>
<head>
	<meta charset = "utf-8">
	<title>Formulaire : </title>
</head>
<body>
<fieldset>
<legend>Ajouter un utilisateur</legend>
<form name = "Formulaire" method = "post">
<label>ID : <label><input type="text" name="id"></br>
<label>Login : <label><input type="text" name="login"></br>
<label>Password : <label><input type="password" name="password"></br>
<label>First Name : <label><input type="text" name="firstname"></br>
<label>Last Name : <label><input type="text" name="lastname"></br>
<label>Email : <label><input type="text" name="email"></br>
<label>Image : <label><input type="text" name="img"></br>
<label>ID rôle : <label><input type="text" name="idr"></br>
</fieldset>
</br>
<input type="submit" name="valider">
<input type="reset" name="reinit">
<input type = "button" size = "10" name = "Retour" value="Retour" Onclick="javascript:location.href='index.php'" ></br></hr>
</form>
</body>
</html>
<?php
 if(isset($_POST['valider'])){
	if(!empty($_POST['id']))
		$id = $_POST['id'];
	if(!empty($_POST['login']))
		$login = $_POST['login'];
	if(!empty($_POST['password']))
		$password = $_POST['password'];
	if(!empty($_POST['firstname']))
		$firstname = $_POST['firstname'];
	if(!empty($_POST['lastname']))
		$lastname = $_POST['lastname'];
	if(!empty($_POST['email']))
		$email = $_POST['email'];
	if(!empty($_POST['img']))
		$img = $_POST['img'];
	if(!empty($_POST['idr']))
		$idr = $_POST['idr'];
	
$db_username = "root";
$db_password = "";
$db = $db = "mysql:dbname=phalcon-td0;host=localhost";
$conn = ConnecterPDO($db,$db_username,$db_password);
$req = "insert into user values ('$id','$login','$password','$firstname','$lastname','$email','$img','$idr')";
$tab = LireDonneesPDO1($conn,$req);

	
	
	
	
	
	
 }