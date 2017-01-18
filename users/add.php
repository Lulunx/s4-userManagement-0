<?php
include ("conn.php");
include ("add.html");

echo "<PRE>";

if(isset($_POST['EN'])){
	if($_POST['id'] != ""){
		if($_POST['login'] != ""){
			if($_POST['password'] != ""){
				if($_POST['prenom'] != ""){
					if($_POST['nom'] != ""){
						if($_POST['mail'] != ""){
							if($_POST['roleselec'] != ""){
								$login = $_POST['login'];
								$id= $_POST['id'];
								$password = $_POST['password'];
								$prenom= $_POST['prenom'];
								$nom= $_POST['nom'];
								$mail = $_POST['mail'];
								$roleselec= $_POST['roleselec'];
								$test=verifidpasdejapris($id);
								if($test==0){
									$conn=conn();
									$sql = "insert into role (id, login, password, firstname, lastname, email, image, idrole) values ($id, '$login', '$password', '$prenom', '$nom', '$mail', NULL, $roleselec)";
									$conn->exec($sql);
									echo "Donnée inserée !";
								}
								else{
									echo "id existe déja";
								}
							}
						}
					}
				}
			}
		}
	}
}

function verifidpasdejapris($id){ 
	$conn=conn();
	$sql = "select count(id) from user where id = '$id'";
	$donnee = LireDonneesPDO1($conn,$sql);
	foreach($donnee as $ligne){
		foreach($ligne as $cle =>$valeur)
			return $valeur;
	}
}

function listerole(){ 
	$conn = conn(); //Est située ici et non donc consultation.php afin de pouvoir s'en servir sur insertioncoureur.php !
	$name = "roleselec";
	echo "<SELECT name=$name id=$name Size='1'>";
	$sql = 'select id, name from role order by name';
	$donnee = LireDonneesPDO1($conn,$sql);
	echo "<OPTION value ='-----'>-----</OPTION>";
	foreach($donnee as $ligne){
		foreach($ligne as $cle =>$valeur){
			if($cle == "id")
				echo "<OPTION value = $valeur ",VerifSelect($name, $valeur);
			elseif($cle == "name")
				echo ">$valeur</OPTION>";
		}
	}
	echo "</SELECT>";
}
echo "</PRE>";
?>