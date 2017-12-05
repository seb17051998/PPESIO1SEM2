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
		$requete_prepare_1=$connexion->prepare("select  idEleve, nomEleve, prenomEleve, emailEleve, optionEleve, nomClasse from eleve");
		$requete_prepare_1->execute();
		/*echo "<table><caption><strong>liste des élèves de BTS SIO</strong></caption>";
		echo "<thead> <!-- En-tête du tableau -->";
		echo "<tr><th>ID</th><th>Nom élève</th><th>Prenom élève</th><th>Filière</th><th>Doumé</th><th>Option</th><th>Année Diplôme</th><th>Adresse électronique</th></tr>";
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
		<th>Email</th>
		<th>Option</th>
		<th>Classe</th>

<?php	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
		{
			?>
			<tr><td>
			<?php
			echo $ligne->idEleve;
			?></td><td>
			<?php
			echo $ligne->nomEleve;?></td><td>
			<?php
			echo $ligne->prenomEleve;?></td><td>
			<?php
			echo $ligne->emailEleve;?></td><td>
			<?php
			echo $ligne->optionEleve;?></td><td>
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

<br/>
<table>

<!--<th><h2><center>Ajouter un élève</center></h2></th>
<form method="post" action="index.php?page=eleves"><br/>
<tr><th><b>Nom : </b></th><td><input type="text" placeholder="Votre nom de famille" name="nomEleve"/></td></tr>
<tr><th><b>Prénom : </b></th><td><input type="text" placeholder="Votre prénom" name="prenomEleve"/></td></tr>
<tr><th><b>Option</b></th>
<td><input type="radio" name="optionEleve" value="SLAM" id="SLAM" checked="checked" /> <label for="SLAM">SLAM</label>
<input type="radio" name="optionEleve" value="SISR" id="SISR" /> <label for="SISR">SISR</label></td></tr>
<tr><th><b>Classe : </b></th><td><input type="text" placeholder="Votre classe" name="nomClasse"/></td></tr>
<tr><th><b>Email : </b></th><td><input type="email" placeholder="ex: benito.jean-michel@sio.jjr" name="emailEleve"/></td></tr>
<th></th><th><input type="Submit" name="add" value="Ajouter un élève"/></th>
</form>
</tr>
</table>

<table>
<th><h2><center>Supprimer un élève</center></h2></th>
<form method="post" action="index.php?page=eleves"><br/>
<tr><th><b>Id de l'élève à supprimer : </b></th><td><input type="text" placeholder="Id à supprimer" name="idElevedel"/></td></tr>
<tr><th></th><th><input type="Submit" name="delete" value="Supprimer un élève"/></th></tr>
</table>

<table>-->

<th><h2><center>Gestion d'un élève</center></h2></th>
<form method="post" action="index.php?page=eleves"><br/>
<tr><th><b>Id : </b></th><td><input type="text" placeholder="Id à modifier" name="idEleve"/></td></tr>
<tr><th><b>Nom : </b></th><td><input type="text" placeholder="Votre nom de famille" name="nomEleve"/></td></tr>
<tr><th><b>Prénom : </b></th><td><input type="text" placeholder="Votre prénom" name="prenomEleve"/></td></tr>
<tr><th><b>Option</b></th>
<td><input type="radio" name="optionEleve" value="SLAM" id="SLAM" checked="checked" /> <label for="SLAM">SLAM</label>
<input type="radio" name="optionEleve" value="SISR" id="SISR" /> <label for="SISR">SISR</label></td></tr>
<tr><th><b>Classe : </b></th><td><input type="text" placeholder="Votre classe" name="nomClasse"/></td></tr>
<tr><th><b>Email : </b></th><td><input type="email" placeholder="ex: benito.jean-michel@sio.jjr" name="emailEleve"/></td></tr>
<tr><th></th><th><input type="Submit" id="button" name="add" value="Ajouter un élève"/></th></tr>
<tr><th></th><th><input type="Submit" id="button" name="edit" value="Modifier un élève"/></th></tr>
<tr><th></th><th><input type="Submit" id="button" name="delete" value="Supprimer un élève"/></th></tr>
<tr><th></th><th><input type="Submit" id="button" name="début" value="<<"/>
<input type="Submit" id="button" name="précédent" value="<"/>
<input type="Submit" id="button" name="suivant" value=">"/>
<input type="Submit" id="button" name="fin" value=">>"/></th></tr>

</form>
</tr>
</table>

<?php
if (isset($_POST['add']))
{
	
		$nom = $_POST['nomEleve'];
		
		$prenom = $_POST['prenomEleve'];
		$option = $_POST['optionEleve'];
		echo $option;
		$classe = $_POST['nomClasse'];
		$email = $_POST['emailEleve'];
		if (empty($nom) || empty($prenom) || empty($option) || empty($classe) | empty($email))
			echo "Veuillez renseignez tous les champs";
		else
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("INSERT INTO eleve (nomEleve, prenomEleve, emailEleve, optionEleve, nomClasse) VALUES ('$nom', '$prenom', '$email', '$option', '$classe')");
			
			
			
			if (@mysql_query($reponse))
			echo "L'eleve a été créé avec succès";
			else
			echo "Ajout affecté";
		
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
		$id = $_POST['idEleve'];
		$nom = $_POST['nomEleve'];
		$prenom = $_POST['prenomEleve'];
		$option = $_POST['optionEleve'];
		echo $option;
		$classe = $_POST['nomClasse'];
		$email = $_POST['emailEleve'];
		if (empty($id)|| empty($nom) || empty($prenom) || empty($option) || empty($classe) | empty($email))
			echo "Veuillez renseignez tous les champs";
		else
		{
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("Update eleve set nomEleve='$nom', prenomEleve='$prenom', optionEleve='$option', nomClasse='$classe', emailEleve='$email' where idEleve='$id'");
			
			
			
			if (@mysql_query($reponse))
			echo "L'eleve a été créé avec succès";
			else
			echo "Modification effectué";
		
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
		$id = $_POST['idEleve'];
			$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);			
			$connexion->exec("delete from eleve where idEleve='$id'");
			
			
			
			if (@mysql_query($reponse))
			echo "L'eleve a été créé avec succès";
			else
			echo "Suppression effectué";
		
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

if(isset($_POST['début']))
{
	?>
	<table>
   <caption id="phrase">Premier élève de la liste</caption>
   <thead> <!-- En-tête du tableau -->
       <tr>
			<th>Id</th>
 			<th>Nom</th>
			<th>Prenom</th>
			<th>Email</th>
			<th>Option</th>
			<th>Classe</th>
		</tr>
</thead>
<tfoot> <!-- Pied de tableau -->
       <tr>
			<th>Id</th>
 			<th>Nom</th>
			<th>Prenom</th>
			<th>Email</th>
			<th>Option</th>
			<th>Classe</th>
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
	$requete_prepare_1=$connexion->prepare("select * from eleve where idEleve=(Select min(idEleve) from eleve)");
	$requete_prepare_1->execute();
	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
	{
		?>
		<tr><td>
		<?php echo $ligne->idEleve;?></td><td>
		<?php echo $ligne->nomEleve;?></td><td>
		<?php echo $ligne->prenomEleve;?></td><td>
		<?php echo $ligne->optionEleve;?></td><td>
		<?php echo $ligne->nomClasse;?></td><td>
		<?php echo $ligne->emailEleve;?></td>
		</tr>
		<?php
	}
	?>
</table> <?php
		
	
}

if(isset($_POST['fin']))
{
	?>
	<table>
   <caption id="phrase">Dernier élève de la liste</caption>
   <thead> <!-- En-tête du tableau -->
       <tr>
			<th>Id</th>
 			<th>Nom</th>
			<th>Prenom</th>
			<th>Email</th>
			<th>Option</th>
			<th>Classe</th>
		</tr>
</thead>
<tfoot> <!-- Pied de tableau -->
       <tr>
			<th>Id</th>
 			<th>Nom</th>
			<th>Prenom</th>
			<th>Email</th>
			<th>Option</th>
			<th>Classe</th>
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
	$requete_prepare_1=$connexion->prepare("select * from eleve where idEleve=(Select max(idEleve) from eleve)");
	$requete_prepare_1->execute();
	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
	{
		?>
		<tr><td>
		<?php echo $ligne->idEleve;?></td><td>
		<?php echo $ligne->nomEleve;?></td><td>
		<?php echo $ligne->prenomEleve;?></td><td>
		<?php echo $ligne->optionEleve;?></td><td>
		<?php echo $ligne->nomClasse;?></td><td>
		<?php echo $ligne->emailEleve;?></td>
		</tr>
		<?php
	}
	?>
</table> <?php
		
	
}

if(isset($_POST['suivant']))
{
	?>
	<table>
   <caption>Dernier élève de la liste</caption>
   <thead> <!-- En-tête du tableau -->
       <tr>
			<th>Id</th>
 			<th>Nom</th>
			<th>Prenom</th>
			<th>Email</th>
			<th>Option</th>
			<th>Classe</th>
		</tr>
</thead>
<tfoot> <!-- Pied de tableau -->
       <tr>
			<th>Id</th>
 			<th>Nom</th>
			<th>Prenom</th>
			<th>Email</th>
			<th>Option</th>
			<th>Classe</th>
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
	$requete_prepare_1=$connexion->prepare("select * from eleve where idEleve=1+1");
	$requete_prepare_1->execute();
	while($ligne=$requete_prepare_1->fetch(PDO::FETCH_OBJ))
	{
		?>
		<tr><td>
		<?php echo $ligne->idEleve;?></td><td>
		<?php echo $ligne->nomEleve;?></td><td>
		<?php echo $ligne->prenomEleve;?></td><td>
		<?php echo $ligne->optionEleve;?></td><td>
		<?php echo $ligne->nomClasse;?></td><td>
		<?php echo $ligne->emailEleve;?></td>
		</tr>
		<?php
	}
	?>
</table> <?php
		
	
}
