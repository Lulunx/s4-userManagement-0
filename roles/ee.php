<?php
	include("connection.php");

$db_username = "root";
$db_password = "";
$db = $db = "mysql:dbname=phalcon-td0;host=localhost";
$conn = ConnecterPDO($db,$db_username,$db_password);

$req = "SELECT name, count(idrole) from role join user on (user.idrole = role.id) group by name
UNION
(select name, '0' from role where id not in (select idrole from user));";
$tab = LireDonneesPDO1($conn,$req);

?>
<!DOCTYPE HTML>
<head>
	<meta charset = "utf-8">
	<title>Index </title>
</head>
<body>
<form name = "Formulaire" method = "post">

<label>Filtre name : </label><input type="text" name="fil_nom">&nbsp
<input type="submit" name="fil_val">
</br></br>
<table cellspacing=\"2\" cellpadding=\"2;\" border="3">
<thead>
<tr style=\"background-color:lightgrey;\">
<td><b>Name</b>
<input type="button" value="▲">
<input type="button" value="▼">
</td>
<td><b>nb User</b>
<input type="button" value="▲">
<input type="button" value="▼">
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