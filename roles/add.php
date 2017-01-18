<?php
include ("conn.php");
include ("add.html");

echo "<PRE>";

if(isset($_POST['EN'])){
	if($_POST['rolesnom'] != ""){
		if($_POST['idrole'] != ""){
			$rolesnom = $_POST['rolesnom'];
			$idrole= $_POST['idrole'];
			$test=verifidpasdejapris($idrole);
			if($test==0){
				$conn=conn();
				$sql = "insert into role (id, name) values ($idrole, '$rolesnom')";
				$conn->exec($sql);
				echo "Donnée inserée !";
			}
			else{
				echo "id existe déja";
			}
		}
	}
}

function verifidpasdejapris($id){ 
	$conn=conn();
	$sql = "select count(id) from role where id = '$id'";
	$donnee = LireDonneesPDO1($conn,$sql);
	foreach($donnee as $ligne){
		foreach($ligne as $cle =>$valeur)
			return $valeur;
	}
}

echo "</PRE>";
?>