<?php
	include("connection.php");
	
$db_username = "root";
$db_password = "";
$db = $db = "mysql:dbname=phalcon-td0;host=localhost";
$conn = ConnecterPDO($db,$db_username,$db_password);

$filtre = "";
if(isset($_GET['fil_nom']))
	$filtre .= "where name like '".$_GET['fil_nom']."%'";

$tri = "";
if(isset($_GET['n_croi']))
	$tri = "order by name";
if(isset($_GET['n_decroi']))
	$tri = "order by name desc";
if(isset($_GET['nb_croi']))
	$tri = "order by nb_user";
if(isset($_GET['nb_decroi']))
		$tri = "order by nb_user desc";

$req = "SELECT name, count(idrole) as nb_user from role join user on (user.idrole = role.id) $filtre group by name
UNION
(select name, '0' from role where id not in (select idrole from user)) $tri";
$tab = LireDonneesPDO1($conn,$req);

?>
<!DOCTYPE HTML>
<head>
	<meta charset = "utf-8">
	<title>Index </title>
</head>
<body>
<form name = "Formulaire" method = "get">

<label>Filtre name : </label><input type="text" name="fil_nom">&nbsp
<input type="submit" name="fil_val">
</br></br>
<table cellspacing=\"2\" cellpadding=\"2;\" border="3">
<thead>
<tr style=\"background-color:lightgrey;\">
<td><b>Name</b>
<input type="submit" value="▲" name ="n_croi" onclick="">
<input type="submit" value="▼" name ="n_decroi" onclick="">
</td>
<td><b>nb User</b>
<input type="submit" value="▲" name ="nb_croi">
<input type="submit" value="▼" name ="nb_decroi">
</td>
<td><b>Actions</b></td>
</thead>
<tbody>
<?php
AfficherDonnee($tab);
?>
</tbody>
</table></br>

</br></br>
<input type="button" value="Voir les rôles" onclick="javascript:location.href='show.php'">&nbsp
<input type="button" value="Ajouter un rôle" onclick="javascript:location.href='add.php'">&nbsp
</form>
</body>
</html>
