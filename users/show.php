<?php
include ("conn.php");
include ("show.html");

echo "<PRE>";

if(isset($_POST['EN'])){
		if($_POST['login'] != "-----"){
			$login = $_POST['login'];
			$conn=conn();
			$sql = "select * from user where id = '$login'";
			$donnee = LireDonneesPDO1($conn,$sql);
			AfficherDonnee($donnee);
		}
}

function listelogin(){ 
	$conn = conn(); //Est située ici et non donc consultation.php afin de pouvoir s'en servir sur insertioncoureur.php !
	$name = "login";
	echo "<SELECT name=$name id=$name Size='1'>";
	$sql = 'select id, login from user order by login';
	$donnee = LireDonneesPDO1($conn,$sql);
	echo "<OPTION value ='-----'>-----</OPTION>";
	foreach($donnee as $ligne){
		foreach($ligne as $cle =>$valeur){
			if($cle == "id")
				echo "<OPTION value = $valeur ",VerifSelect($name, $valeur);
			elseif($cle == "login")
				echo ">$valeur</OPTION>";
		}
	}
}

echo "</PRE>";
?>