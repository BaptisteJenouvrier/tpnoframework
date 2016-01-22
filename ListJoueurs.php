<?php
	include("fonction.php");
	$bdd = connexionBDD();
	include("listeJoueurs.html");
	
	$select="select prenom, nom, codePays, libelle, annee, rang, points, diff, nbMatchs
	from joueur 
	inner join pays on codePays=code
	inner join classement on id=idJoueur;";
	$reponse = $bdd->query($select);
	echo "<table>";
	echo "<tr>
	<td>Prenom</td>
	<td>Nom</td>
	<td>Pays</td>
	<td>Rang</td>
	<td>Points</td>
	<td>Différence</td>
	<td>Nombre de matchs</td>
	</tr>";
	while($donnees = $reponse->fetch()){
		echo "<tr>";
		echo "<td>" . $donnees["prenom"] . "</td>";
		echo "<td>" . $donnees["nom"] . "</td>";
		echo "<td>" . $donnees["libelle"] . " (" . $donnees["codePays"] . ")</td>";
		echo "<td>" . $donnees["rang"] . "</td>";
		echo "<td>" . $donnees["points"] . "</td>";
		echo "<td>" . $donnees["diff"] . "</td>";
		echo "<td>" . $donnees["nbMatchs"] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
?>