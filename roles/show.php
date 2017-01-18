<?php
include ("conn.php");
include ("show.html");

echo "<PRE>";

if(isset($_POST['EN'])){
		if($_POST['roleselec'] != "-----"){
			$roleselec = $_POST['roleselec'];
			$conn=conn();
			$sql = "select * from role where id = '$roleselec'";
			$donnee = LireDonneesPDO1($conn,$sql);
			AfficherDonnee($donnee);
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