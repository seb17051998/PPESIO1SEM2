<br/>
<?php 
	$PARAM_hote='apache2sio1.sio.jjr'; 
	$PARAM_port='3306';
	$PARAM_nom_bd='administrationlts'; 
	$PARAM_utilisateur='root'; 
	$PARAM_mot_passe=''; 
	try {
		$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);
		}
	catch(Exception $e) {
		echo 'Erreur : '.$e->getMessage().'<br/>';
		echo 'N° : '.$e->getCode();
	
	}
		$requete_prepare_1=$connexion->prepare("select  idClasse, nomClasse from classe");
		$requete_prepare_1->execute();
		/*echo "<table><caption><strong>liste des élèves de BTS SIO</strong></caption>";
		echo "<thead> <!-- En-tête du tableau -->";
		echo "<tr><th>ID</th><th>Nom élève</th><th>Prenom élève</th><th>Filière</th><th>Classe</th><th>Option</th><th>Année Diplôme</th><th>Adresse électronique</th></tr>";
		echo "</thead>";
		echo "<tfoot> <!-- Pied de tableau -->";
		echo "<tr></tr>";
		echo "</tfoot>";
		echo "<tbody> <!-- Corps du tableau -->";
		$ligne = $requete_prepare_1->fetch(PDO::FETCH_OBJ);
		echo $ligne;*/
		?>
		<center><table>
		<th>ID</th>
		<th>Classe</th>
		

<?php	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
		{
			?>
			<tr><td>
			<?php
			echo $ligne->idClasse;
			?></td><td>
			<?php
			echo $ligne->nomClasse;?></td>
			</tr>
			<?php
		}
//$resultats->closeCursor();


/* $requete=mysqli_query($connexion, "select * from eleve");

($ligne=mysql_fetch_array ($requete)); */

?>
</table></center>

<!--<br/>
<table>
<tr><th><h2><center>Ajouter une classe</center></h2></th></tr>
<form method="post" action="index.php?page=classes"><br/><br/>
<tr><th><b>Classe : </b></th><td><input type="text" placeholder="ex: BTS SIO 1" name="nomClasse"/></td></tr><br/><br/>
<tr><th></th><th><input type="Submit" name="add" value="Ajouter une classe"/></th></tr>
</form>-->

</table></center>

<br/>
<table>
<tr><th><h2><center>Gestion d'une classe</center></h2></th></tr>
<form method="post" action="index.php?page=classes"><br/><br/>
<tr><th><b>ID : </b></th><td><input type="text" placeholder="Id de la classe" name="idClasse"/></td></tr><br/><br/>
<tr><th><b>Classe : </b></th><td><input type="text" placeholder="ex: BTS SIO 1" name="nomClasse"/></td></tr><br/><br/>
<tr><th></th><th><input type="Submit" id="button" name="add" value="Ajouter une classe"/></th></tr>
<tr><th></th><th><input type="Submit" id="button" name="edit" value="Modifier une classe"/></th></tr>
<tr><th></th><th><input type="Submit" id="button" name="delete" value="Supprimer une classe"/></th></tr>
<tr><th></th><th><input type="Submit" id="button" name="début" value="<<"/>
<input type="Submit" id="button" name="précédent" value="<"/>
<input type="Submit" id="button" name="suivant" value=">"/>
<input type="Submit" id="button" name="fin" value=">>"/></th></tr>
</form>
</table>

<!--<table>
<tr><th><h2><center>Supprimer une classe</center></h2></th></tr>
<form method="post" action="index.php?page=classes"><br/><br/>
<tr><th><b>ID : </b></th><td><input type="text" placeholder="Id de la classe" name="idClasses"/></td></tr><br/><br/>
<tr><th></th><th><input type="Submit" name="delete" value="Supprimer une classe"/></th></tr>
</form>
</table>-->


<?php
if (isset($_POST['add']))
{
	
		$classe = $_POST['nomClasse'];
		if (empty($classe))
			echo "Veuillez renseignez tous les champs";
		else
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("INSERT INTO classe (nomClasse) VALUES ('$classe')");
			
			
			
			if (@mysql_query($reponse))
			echo "L'employé a été créé avec succès";
			else
			echo "Ajout effecté, veuillez rafraichir la page afin qu'il apparaisse, si il n'apparait pas, il y a une erreur dans votre saisie";
		
		/*if (isset($_POST['optionEleve'] == SLAM))
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("update eleve set optionEleve = "SLAM" where .'$nom' = $_POST['nomEleve']");
		}
		else{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("update eleve set optionEleve = "SLAM" where .'$nom' = $_POST['nomEleve']");
		}*/
		}
}

if (isset($_POST['edit']))
{
		$idClasse = $_POST['idClasse'];
		$nomClasse = $_POST['nomClasse'];
		if (empty($idClasse) || empty($nomClasse))
			echo "Veuillez renseignez tous les champs";
		else
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("update classe set nomClasse='$nomClasse' where idClasse='$idClasse'");
			
			
			
			if (@mysql_query($reponse))
			echo "";
			else
			echo "Modification effecté, veuillez rafraichir la page afin qu'il apparaisse, si il n'apparait pas, il y a une erreur dans votre saisie";
		
		/*if (isset($_POST['optionEleve'] == SLAM))
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("update eleve set optionEleve = "SLAM" where .'$nom' = $_POST['nomEleve']");
		}
		else{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("update eleve set optionEleve = "SLAM" where .'$nom' = $_POST['nomEleve']");
		}*/
		}
}

if (isset($_POST['delete']))
{
		$idClasses = $_POST['idClasse'];
		if (empty($idClasses))
			echo "Veuillez renseignez tous les champs";
		else
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("delete from classe where idClasse='$idClasses'");
			
			
			
			if (@mysql_query($reponse))
			echo "";
			else
			echo "Suppression effecté, veuillez rafraichir la page afin qu'il apparaisse, si il n'apparait pas, il y a une erreur dans votre saisie";
		
		/*if (isset($_POST['optionEleve'] == SLAM))
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("update eleve set optionEleve = "SLAM" where .'$nom' = $_POST['nomEleve']");
		}
		else{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("update eleve set optionEleve = "SLAM" where .'$nom' = $_POST['nomEleve']");
		}*/
		}
}

if (isset($_POST['début']))
{
	?>
	<table>
	<caption id="phrase">Première Classe de la liste</caption>
	<thead> <!-- En-tête du tableau -->
		<tr>
				<th>IdClasse</th>
				<th>NomClasse</th>
				
		</tr>
	</thead>
	<tfoot> <!-- Pied de tableau -->
		<tr>
				<th>IdClasse</th>
				<th>NomClasse</th>
		</tr>
   </tfoot>   
   <tbody> <!-- Corps du tableau --> 
<?php   
	try 
	{
		$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);
	}
	catch(Exception $e)
	{		
		echo 'Erreur : '.$e->getMessage().'<br/>';
		echo 'N° : '.$e->getCode();
	}
   
   
	$requete_prepare_1=$connexion->prepare("select * from classe where idClasse=(Select min(idClasse) from classe)");
	$requete_prepare_1->execute();
	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
	{
		?>
		<tr><td>
		<?php echo $ligne->idClasse;?></td><td>
		<?php echo $ligne->nomClasse;?></td>
		
		</tr>
		<?php
	}
	?>
</table> <?php
		
	

}

if (isset($_POST['fin']))
{
	?>
	<table>
	<caption id="phrase">Première Classe de la liste</caption>
	<thead> <!-- En-tête du tableau -->
		<tr>
				<th>IdClasse</th>
				<th>NomClasse</th>
				
		</tr>
	</thead>
	<tfoot> <!-- Pied de tableau -->
		<tr>
				<th>IdClasse</th>
				<th>NomClasse</th>
		</tr>
   </tfoot>   
   <tbody> <!-- Corps du tableau --> 
<?php   
	try 
	{
		$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);
	}
	catch(Exception $e)
	{		
		echo 'Erreur : '.$e->getMessage().'<br/>';
		echo 'N° : '.$e->getCode();
	}
   
   
	$requete_prepare_1=$connexion->prepare("select * from classe where idClasse=(Select max(idClasse) from classe)");
	$requete_prepare_1->execute();
	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
	{
		?>
		<tr><td>
		<?php echo $ligne->idClasse;?></td><td>
		<?php echo $ligne->nomClasse;?></td>
		
		</tr>
		<?php
	}
	?>
</table> <?php
		
	

}
