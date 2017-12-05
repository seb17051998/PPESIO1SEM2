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
		$requete_prepare_1=$connexion->prepare("select  idEntreprise, nomEntreprise, secteurActivite, adresseEntreprise, villeEntreprise, cpEntreprise, numTelEntreprise from entreprise");
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
		<th>Entreprise</th>
		<th>Secteur d'activité</th>
		<th>Adresse</th>
		<th>Ville</th>
		<th>Code Postal</th>
		<th>Numéro de téléphone</th>

<?php	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
		{
			?>
			<tr><td>
			<?php
			echo $ligne->idEntreprise;
			?></td><td>
			<?php
			echo $ligne->nomEntreprise;?></td><td>
			<?php
			echo $ligne->secteurActivite;?></td><td>
			<?php
			echo $ligne->adresseEntreprise;?></td><td>
			<?php
			echo $ligne->villeEntreprise;?></td><td>
			<?php
			echo $ligne->cpEntreprise;?></td><td>
			<?php
			echo $ligne->numTelEntreprise;?></td>
			</tr>
			<?php
		}
//$resultats->closeCursor();


/* $requete=mysqli_query($connexion, "select * from eleve");

($ligne=mysql_fetch_array ($requete)); */

?>
</table></center>
<br/>
<table>
<tr><th><h2><center>Gestion d'une entreprise</center></h2></th></tr>
<form method="post" action="index.php?page=entreprises"><br/><br/>
<tr><th><b>Id : </b></th><td><input type="text" placeholder="Id de l'entreprise" name="idEntreprise"/></td></tr><br/><br/>
<tr><th><b>Entreprise : </b></th><td><input type="text" placeholder="ex: Microsoft" name="nomEntreprise"/></td></tr><br/><br/>
<tr><th><b>Secteur d'activité : </b></th><td><input type="text" placeholder="ex : Informatique" name="secteurActivite"/></td></tr><br/><br/>
<tr><th><b>Adresse : </b></th><td><input type="text" placeholder="Adresse de l'entreprise" name="adresseEntreprise"/></td></tr><br/><br/>
<tr><th><b>Ville : </b></th><td><input type="text" placeholder="Ville de l'entreprise" name="villeEntreprise"/></td></tr><br/><br/>
<tr><th><b>Code postal : </b></th><td><input type="text" placeholder="ex : 75000" name="cpEntreprise"/></td></tr><br/><br/>
<tr><th><b>Numéro de téléphone : </b></th><td><input type="text" placeholder="ex : 06 12 34 56 78" name="numTelEntreprise"/></td></tr><br/><br/>
<tr><th></th><th><input type="Submit" id="button" name="add" value="Ajouter une entreprise"/></th></tr>
<tr><th></th><th><input type="Submit" id="button" name="editer" value="Modifier une entreprise"/></th></tr>
<tr><th></th><th><input type="Submit" id="button" name="delete" value="Supprimer une entreprise"/></th></tr>
<tr><th></th><th><input type="Submit" id="button" name="début" value="<<"/>
<input type="Submit" id="button" name="précédent" value="<"/>
<input type="Submit" id="button" name="suivant" value=">"/>
<input type="Submit" id="button" name="fin" value=">>"/></th></tr>
</form>
</table>

<?php
if (isset($_POST['add']))
{
	
		$nom = $_POST['nomEntreprise'];
		$secteur = $_POST['secteurActivite'];
		$adresse = $_POST['adresseEntreprise'];
		$ville = $_POST['villeEntreprise'];
		$cp = $_POST['cpEntreprise'];
		$tel = $_POST['numTelEntreprise'];
		if (empty($nom) || empty($secteur) || empty($adresse) || empty($ville) | empty($cp) | empty($tel))
			echo "Veuillez renseignez tous les champs";
		else
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("INSERT INTO entreprise (nomEntreprise, secteurActivite, adresseEntreprise, villeEntreprise, cpEntreprise, numTelEntreprise) VALUES ('$nom', '$secteur', '$adresse', '$ville', '$cp', '$tel')");
			
			
			
			if (@mysql_query($reponse))
			echo "Ajout effectué";
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

if (isset($_POST['editer']))
{
		$id = $_POST['idEntreprise'];
		$nom = $_POST['nomEntreprise'];
		$secteur = $_POST['secteurActivite'];
		$adresse = $_POST['adresseEntreprise'];
		$ville = $_POST['villeEntreprise'];
		$cp = $_POST['cpEntreprise'];
		$tel = $_POST['numTelEntreprise'];
		if (empty($id) || empty($nom) || empty($secteur) || empty($adresse) || empty($ville) | empty($cp) | empty($tel))
			echo "Veuillez renseignez tous les champs";
		else
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("Update entreprise set nomEntreprise='$nom',secteurActivite='$secteur',adresseEntreprise='$adresse',villeEntreprise='$ville',cpEntreprise='$cp',numTelEntreprise='$tel' where idEntreprise='$id'");
			
			
			
			if (@mysql_query($reponse))
			echo "Modification effectué";
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
		$id = $_POST['idEntreprise'];

		if (empty($id))
			echo "Veuillez renseignez tous les champs";
		else
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("delete from entreprise where idEntreprise='$id'");
			
			
			
			if (@mysql_query($reponse))
			echo "Suppression effectué";
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
				<th>Id</th>
				<th>Entreprise</th>
				<th>Secteur d'activité</th>
				<th>Adresse</th>
				<th>Ville</th>
				<th>Code Postal</th>
				<th>Numéro de téléphone</th>
				
				
		</tr>
	</thead>
	<tfoot> <!-- Pied de tableau -->
		<tr>
				<th>Id</th>
				<th>Entreprise</th>
				<th>Secteur d'activité</th>
				<th>Adresse</th>
				<th>Ville</th>
				<th>Code Postal</th>
				<th>Numéro de téléphone</th>
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
   
   
	$requete_prepare_1=$connexion->prepare("select * from entreprise where idEntreprise=(Select min(idEntreprise) from entreprise)");
	$requete_prepare_1->execute();
	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
	{
		?>
		<tr><td>
		<?php echo $ligne->idEntreprise;?></td><td>
		<?php echo $ligne->nomEntreprise;?></td><td>
		<?php echo $ligne->secteurActivite;?></td><td>
		<?php echo $ligne->adresseEntreprise;?></td><td>
		<?php echo $ligne->villeEntreprise;?></td><td>
		<?php echo $ligne->cpEntreprise;?></td><td>
		<?php echo $ligne->numTelEntreprise;?></td>
		
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
				<th>Id</th>
				<th>Entreprise</th>
				<th>Secteur d'activité</th>
				<th>Adresse</th>
				<th>Ville</th>
				<th>Code Postal</th>
				<th>Numéro de téléphone</th>
				
				
		</tr>
	</thead>
	<tfoot> <!-- Pied de tableau -->
		<tr>
				<th>Id</th>
				<th>Entreprise</th>
				<th>Secteur d'activité</th>
				<th>Adresse</th>
				<th>Ville</th>
				<th>Code Postal</th>
				<th>Numéro de téléphone</th>
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
   
   
	$requete_prepare_1=$connexion->prepare("select * from entreprise where idEntreprise=(Select max(idEntreprise) from entreprise)");
	$requete_prepare_1->execute();
	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
	{
		?>
		<tr><td>
		<?php echo $ligne->idEntreprise;?></td><td>
		<?php echo $ligne->nomEntreprise;?></td><td>
		<?php echo $ligne->secteurActivite;?></td><td>
		<?php echo $ligne->adresseEntreprise;?></td><td>
		<?php echo $ligne->villeEntreprise;?></td><td>
		<?php echo $ligne->cpEntreprise;?></td><td>
		<?php echo $ligne->numTelEntreprise;?></td>
		
		</tr>
		<?php
	}
	?>
</table> <?php
		
	

}

