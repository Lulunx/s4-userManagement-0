<?php
	include("connection.php");


$db_username = "root";
$db_password = "";
$db = $db = "mysql:dbname=phalcon-td0;host=localhost";
$conn = ConnecterPDO($db,$db_username,$db_password);

$tri = "";
if(isset($_GET['log_croi']))
	$tri = "order by login";
if(isset($_GET['log_decroi']))
	$tri = "order by login desc";
if(isset($_GET['fn_croi']))
	$tri = "order by firstname";
if(isset($_GET['fn_decroi']))
	$tri = "order by firstname desc";
if(isset($_GET['ln_croi']))
	$tri = "order by lastname";
if(isset($_GET['ln_decroi']))
	$tri = "order by lastname desc";
if(isset($_GET['idr_croi']))
	$tri = "order by idrole";
if(isset($_GET['idr_decroi']))
	$tri = "order by idrole desc";


$req = "SELECT login, firstname, lastname,email,image,idrole from user $tri limit 20";
$tab = LireDonneesPDO1($conn,$req);
?>

<!DOCTYPE HTML>
<head>
	<meta charset = "utf-8">
	<title>Index </title>
</head>
<body>
<form name = "Formulaire" method = "get">
<table cellspacing=\"2\" cellpadding=\"2;\" border="3">
<thead>
<tr style=\"background-color:lightgrey;\">
<td><b>Login</b>
<input type="submit" value="▲" name ="log_croi" onclick="">
<input type="submit" value="▼" name ="log_decroi" onclick="">
</td>
<td><b>FirstName</b>
<input type="submit" value="▲" name ="fn_croi">
<input type="submit" value="▼" name ="fn_decroi">
</td>
<td><b>LastName</b>
<input type="submit" value="▲" name ="ln_croi">
<input type="submit" value="▼" name ="ln_decroi">
</td>
<td><b>Email</b>
</td>
<td><b>Image</b>
</td>
<td><b>IDrôle</b>
<input type="submit" value="▲" name ="idr_croi">
<input type="submit" value="▼" name ="idr_decroi">
</td>
<td><b>Actions</b>
</td>
<?php
AfficherDonnee($tab);
?>
</tbody>
</table></br>
</br></br>
<input type="button" value="Voir les utilisateurs" onclick="javascript:location.href='show.php'">&nbsp
<input type="button" value="Ajouter un utilisateur" onclick="javascript:location.href='add.php'">&nbsp
</form>
</body>
</html>