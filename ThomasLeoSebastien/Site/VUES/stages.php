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
		$requete_prepare_1=$connexion->prepare("select  idStage, nomEleve, prenomEleve, nomClasse, nomEntreprise, dateRDVStage from stage");
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
		<th>Nom</th>
		<th>Prénom</th>
		<th>Classe</th>
		<th>Entreprise</th>
		<th>Date de rendez-vous</th>

<?php	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
		{
			?>
			<tr><td>
			<?php
			echo $ligne->idStage;
			?></td><td>
			<?php
			echo $ligne->nomEleve;?></td><td>
			<?php
			echo $ligne->prenomEleve;?></td><td>
			<?php
			echo $ligne->nomClasse;?></td><td>
			<?php
			echo $ligne->nomEntreprise;?></td><td>
			<?php
			echo $ligne->dateRDVStage;?></td>
			</tr>
			<?php
		}
//$resultats->closeCursor();


/* $requete=mysqli_query($connexion, "select * from eleve");

($ligne=mysql_fetch_array ($requete)); */

?>
</table></center>
<!--<table>
<br/>
<tr><th><h2><center>Ajouter un stage</center></h2></th></tr>
<form method="post" action="index.php?page=stages"><br/><br/>
<tr><th><b>Nom : </b></th><td><input type="text" placeholder="Votre nom de famille" name="nomEleve"/></td></tr><br/><br/>
<tr><th><b>Prénom : </b></th><td><input type="text" placeholder="Votre prénom" name="prenomEleve"/></td></tr><br/><br/>
<tr><th><b>Classe : </b></th><td><input type="text" placeholder="Votre classe" name="nomClasse"/></td></tr><br/><br/>
<tr><th><b>Entreprise : </b></th><td><input type="text" placeholder="ex : Microsoft" name="nomEntreprise"/></td></tr><br/><br/>
<tr><th><b>Date de Rendez-Vous : </b></th><td><input type="date" placeholder="AAAA-MM-JJ" name="dateRDVStage"/></td></tr><br/><br/>
<tr><th></th><th><input type="Submit" name="add" value="Ajouter un stage"/></th></tr>
</form>
</table>-->

<table>
<br/>
<tr><th><h2><center>Gestion d'un stage</center></h2></th></tr>
<form method="post" action="index.php?page=stages"><br/><br/>
<tr><th><b>Id : </b></th><td><input type="text" placeholder="Id de stage" name="idStage"/></td></tr>
<tr><th><b>Nom : </b></th><td><input type="text" placeholder="Votre nom de famille" name="nomEleve"/></td></tr>
<tr><th><b>Prénom : </b></th><td><input type="text" placeholder="Votre prénom" name="prenomEleve"/></td></tr>
<tr><th><b>Classe : </b></th><td><input type="text" placeholder="Votre classe" name="nomClasse"/></td></tr>
<tr><th><b>Entreprise : </b></th><td><input type="text" placeholder="ex : Microsoft" name="nomEntreprise"/></td></tr>
<tr><th><b>Date de Rendez-Vous : </b></th><td><input type="date" placeholder="AAAA-MM-JJ" name="dateRDVStage"/></td></tr>

<tr><th></th><th><input type="Submit" id="button" name="add" value="Ajouter un stage"/></th></tr>
<tr><th></th><th><input type="Submit" id="button" name="edit" value="Modifier un stage"/></th></tr>
<tr><th></th><th><input type="Submit" id="button" name="delete" value="Supprimer un stage"/></th></tr>
<tr><th></th><th><input type="Submit" id="button" name="début" value="<<"/>
<input type="Submit" id="button" name="précédent" value="<"/>
<input type="Submit" id="button" name="suivant" value=">"/>
<input type="Submit" id="button" name="fin" value=">>"/></th></tr>

</form>
</table>

<?php
if (isset($_POST['add']))
{
	
		$nom = $_POST['nomEleve'];
		$prenom = $_POST['prenomEleve'];
		$classe = $_POST['nomClasse'];
		$entreprise = $_POST['nomEntreprise'];
		$daterdv = $_POST['dateRDVStage'];
		if (empty($nom) || empty($prenom) || empty($classe) || empty($entreprise) | empty($daterdv))
			echo "Veuillez renseignez tous les champs";
		else
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("INSERT INTO stage (nomEleve, prenomEleve, nomClasse, nomEntreprise, dateRDVStage) VALUES ('$nom', '$prenom', '$classe', '$entreprise', '$daterdv')");
			
			
			
			if (@mysql_query($reponse))
			echo "Stage ajouté";
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
		$id = $_POST['idStage'];
		$nom = $_POST['nomEleve'];
		$prenom = $_POST['prenomEleve'];
		$classe = $_POST['nomClasse'];
		$entreprise = $_POST['nomEntreprise'];
		$daterdv = $_POST['dateRDVStage'];
		if (empty($id) || empty($nom) || empty($prenom) || empty($classe) || empty($entreprise) | empty($daterdv))
			echo "Veuillez renseignez tous les champs";
		else
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("UPDATE stage set nomEleve='$nom',prenomEleve='$prenom',nomClasse='$classe',nomEntreprise='$entreprise' ,dateRDVStage='$daterdv' where  idStage='$id'");
			
			
			
			if (@mysql_query($reponse))
			echo "Stage modifié";
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


if (isset($_POST['delete']))
{
		$id = $_POST['idStage'];

		if (empty($id))
			echo "Veuillez renseignez tous les champs";
		else
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("delete from stage where idStage='$id'");
			
			
			
			if (@mysql_query($reponse))
			echo "Stage effacé";
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

if (isset($_POST['début']))
{
	?>
	<table>
	<caption id="phrase">Première Classe de la liste</caption>
	<thead> <!-- En-tête du tableau -->
		<tr>
				<th>IdClasse</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Classe</th>
				<th>Entreprise</th>
				<th>Date de rendez-vous</th>
				
				
		</tr>
	</thead>
	<tfoot> <!-- Pied de tableau -->
		<tr>
				<th>IdClasse</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Classe</th>
				<th>Entreprise</th>
				<th>Date de rendez-vous</th>
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
   
   
	$requete_prepare_1=$connexion->prepare("select * from stage where idStage=(Select min(idStage) from stage)");
	$requete_prepare_1->execute();
	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
	{
		?>
		<tr><td>
		<?php echo $ligne->idStage;?></td><td>
		<?php echo $ligne->nomEleve;?></td><td>
		<?php echo $ligne->prenomEleve;?></td><td>
		<?php echo $ligne->nomClasse;?></td><td>
		<?php echo $ligne->nomEntreprise;?></td><td>
		<?php echo $ligne->dateRDVStage;?></td>
		
		
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
	<caption>Première Classe de la liste</caption>
	<thead> <!-- En-tête du tableau -->
		<tr>
				<th>IdClasse</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Classe</th>
				<th>Entreprise</th>
				<th>Date de rendez-vous</th>
				
				
		</tr>
	</thead>
	<tfoot> <!-- Pied de tableau -->
		<tr>
				<th>IdClasse</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Classe</th>
				<th>Entreprise</th>
				<th>Date de rendez-vous</th>
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
   
   
	$requete_prepare_1=$connexion->prepare("select * from stage where idStage=(Select max(idStage) from stage)");
	$requete_prepare_1->execute();
	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
	{
		?>
		<tr><td>
		<?php echo $ligne->idStage;?></td><td>
		<?php echo $ligne->nomEleve;?></td><td>
		<?php echo $ligne->prenomEleve;?></td><td>
		<?php echo $ligne->nomClasse;?></td><td>
		<?php echo $ligne->nomEntreprise;?></td><td>
		<?php echo $ligne->dateRDVStage;?></td>
		
		
		</tr>
		<?php
	}
	?>
</table> <?php
		
	

}
