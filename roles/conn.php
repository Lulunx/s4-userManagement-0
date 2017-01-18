<?php
function conn(){ // permet de se connecter à la base
	$res=false;
	$db_username = "root";
	$db_password = "";
	$db = "phalcon-td0";
	$conn=" ";
	try
	{
	  $conn = new PDO($db,$db_username,$db_password);
	  $res = true;
	}
	catch (PDOException $erreur)
	{
		echo $erreur->getMessage();
	}
	
	return $conn;
}

function LireDonneesPDO1($conn,$sql){ // permet d'obtenir le résultat de la requête
	$i=0;
	foreach($conn->query($sql,PDO::FETCH_ASSOC) as $ligne)     
		$tab[$i++] = $ligne;
	if(isset($tab))
		return $tab;
	else
		return null;
}

function AfficherDonnee($tab){ // permet d'afficher le résultat de la requête
	foreach($tab as $ligne){
		foreach($ligne as $cle =>$valeur)
			echo $cle.":".$valeur."\t";
		echo "<br/>";
	}
}
?>