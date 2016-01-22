<?php
//----------------------------------------------------------------------------------------------------------------------------------------
//Conexion à la base de donnée
//Connexion à la bases de données
	function connexionBDD(){
		try{
			$servername = "localhost";
			$bdd = new PDO('mysql:host=' . $servername . ';dbname=atp;charset=utf8', 'root', '');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $bdd;
		}catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
		}
	}
//----------------------------------------------------------------------------------------------------------------------------------------
function verifSelectvp($variable,$element){
	if (isset($_POST[$element])){ 
		if ($_POST[$element] == $variable){
			echo "selected";
		}
	}
}	
//--------------------------------------------------------------------------------------------------------------
//fonction qui créé les options des selects avec une requete sql
function selectSQL($bdd,$select,$colonne,$req){
	$req = utf8_decode($req);
	$reponse = $bdd->query($req);
	while($donnees = $reponse->fetch()){
		echo '<option name="' . $donnees[$colonne] . '" ';
		echo verifSelectvp($donnees[$colonne],$select);
		echo ">" . $donnees[$colonne] . "</option>";
	}
	$reponse->closeCursor();
}
//--------------------------------------------------------------------------------------------------------------
function selectPoints(){
	$val = 0;
	while($val<=7000){
		echo "<option value='". $val . "' " . verifSelectvp($val,'Points') . ">" . $val . "</option>";
		$val=$val+500;
	}
}
//--------------------------------------------------------------------------------------------------------------
function selectNbMatchs(){
	$val = 0;
	while($val<=35){
		echo "<option value='". $val . "' " . verifSelectvp($val,'NombreMatchs') . ">" . $val . "</option>";
		$val=$val+5;
	}
}
?>