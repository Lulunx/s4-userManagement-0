<?php
include ("conn.php");

$conn=conn();
$sql = "select name, count(firstname) as 'nbr' from role join user on (role.id=user.idrole) group by name";
$donnee = LireDonneesPDO1($conn,$sql);
affichertable($donnee, "");

function affichertable($tab, $titre){ // permet d'afficher la table demandée
		echo "<table width = '100%' rules='all' cellpadding='5px' style='text-align:center; border:solid 1px black; font-family:arial;'>";
		echo "<legend>$titre</legend>";
		echo "<thead><tr style='background-color:#FFFFCC; font-size:16px;'>";
		foreach($tab as $ligne){
			foreach($ligne as $cle =>$valeur)
				echo "<th style='border:solid 2px black;'>$cle</th>";
			break;
		}
		echo "</tr></thead>";
		$i = 0;
		$j = 0;
		foreach($tab as $ligne){
			$line= null;
			$vrai = false;
			$j = 0;
			if($i%2 == 1)
				echo "<tr style='font-size:13px; background-color:#00CCFF;'>";
			else
				echo "<tr style='font-size:13px;'>";
			foreach($ligne as $cle =>$valeur){
				$line[$j] = $valeur;
				$j++;
			}
			foreach($line as $cle =>$valeur){
				if($valeur != null)
					$vrai = true;
			}
			if($vrai){
				foreach($line as $cle =>$valeur)
					echo "<td>$valeur</td>";
			}
			echo "</tr>";
			$i++;
		}
		echo "</table>";
	}
?>