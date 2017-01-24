<script>	
function supprimerDonnees(name){
	var r = confirm("Supprimer ce rôle");
	if (r == true) {
		 window.location  = "http://localhost/s4-userManagement-0/roles/delete.php?nom=" + name;
	}
}

function modifierDonnees(name){
	 window.location  = "http://localhost/s4-userManagement-0/roles/update.php?nom=" + name;
}
</script>
<?php

//Fichier php (Auteur : M.Porcq) qui stocke les fonctions nécessaires aux interactions avec la base, elles ne sont pas toutes utilisées ici
function ConnecterPDO($db,$db_username,$db_password)
{
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
//---------------------------------------------------------------------------------------------------------

function majDonnees($conn,$sql)
{
	$stmt = $conn->exec($sql);
	return $stmt;
}
//---------------------------------------------------------------------------------------------
function preparerRequete($conn,$sql)
{
	$cur = $conn->prepare($sql);
	return $cur;
}
//---------------------------------------------------------------------------------------------

function ajouterParam($cur,$param,$contenu,$type='texte',$taille=0){

$cur->bindParam($param, $contenu);
	return $cur;
}
//---------------------------------------------------------------------------------------------

function majDonneesPreparees($cur)
{
	$res = $cur->execute();
	return $res;
}
//---------------------------------------------------------------------------------------------
function majDonneesPrepareesTab($cur,$tab)
{
	$res = $cur->execute($tab);
	return $res;
}//---------------------------------------------------------------------------------------------

function LireDonneesPDO1($conn,$sql)
{
  $i=0;
  foreach  ($conn->query($sql,PDO::FETCH_ASSOC) as $ligne)     
    $tab[$i++] = $ligne;
  if(isset($tab))
	return $tab;
else
	return null;
}
//---------------------------------------------------------------------------------------------
function LireDonneesPDOPreparee($cur)
{
  $res = $cur->execute();
  $tab = $cur->fetchall();
  return $tab;
}
//---------------------------------------------------------------------------------------------
function LireDonneesPDO2($conn,$sql)
{
  $i=0;
  $cur = $conn->query($sql);
  while ($ligne = $cur->fetch(PDO::FETCH_ASSOC))
    $tab[$i++] = $ligne;
  return $tab;
}
//---------------------------------------------------------------------------------------------
function LireDonneesPDO3($conn,$sql)
{
  $cur = $conn->query($sql);
  $tab = $cur->fetchall(PDO::FETCH_ASSOC);
  return $tab;
}
//---------------------------------------------------------------------------------------------
function AfficherDonnee($tab)
{
if ($tab == null)
		return 1;
  foreach($tab as $ligne)
  {
	 echo"<tr>";
    foreach($ligne as $cle =>$valeur)
	{
		echo "<td>";
		if($cle == 'name')
			$nbutt = $valeur;
		echo $valeur."\t"."&nbsp";
		echo "</td>";
	}
			echo"<td><input type = \"button\" name = \"modifier\" value=\"...\" onclick=\"modifierDonnees('$nbutt');\">
			<input type = \"button\"  name = \"supprimer\" value= \"X\" onclick=\"supprimerDonnees('$nbutt');\" > </td>";

	echo "</tr>";
  }
}
//---------------------------------------------------------------------------------------------
function ExecuterRequete($cur)
{
  $r = oci_execute($cur, OCI_DEFAULT);
  echo "<br>résultat de la requête: $r<br />";
 /* if (!$r) 
  {  
	$e = oci_error($stid);  
	echo htmlentities($e['message']);  
	exit;
  }*/
  return $r;
}

//-----------------------------------------------------------------------------------------------
function afficher($txt)
{
  echo "<PRE>";
  print_r($txt);
  echo "</PRE>";
}

//---------------------------------------------------------------------------------------------
function AfficherDonnee2($tab)
{
	if ($tab == null)
		return 1;
	$compt = 0;
  foreach($tab as $ligne)
  {
    foreach($ligne as $cle =>$valeur)
	{
		if($compt == 0)
			echo "Name : ";
		else
			echo " Nb_user : ";
		//$valeur = utf8_encode($valeur);
		echo $valeur."\t";
	$compt++;

	}
  }
}