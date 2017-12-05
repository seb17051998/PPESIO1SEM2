<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<p>Bonjour !</p>
<p>Récupération des élèves</p> 

<?php
//ouvrir le fichier
 $monfichier = fopen('./fichiers/listeBtsSIO2015_2016.csv', 'r');
 /* connexion base de données
 $PARAM_hote='localhost'; // le chemin vers le serveur
	$PARAM_port='3306';
	$PARAM_nom_bd='gpxbtssio'; // le nom de votre base de données
	$PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
	$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
	try{ 
		$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
	}  
	catch(Exception $e){
		echo 'Erreur : '.$e->getMessage().'<br />';  
		echo 'N° : '.$e->getCode();
	}*/
	if ($connexion) {
		//lire 1ere ligne
		$ligne = fgets($monfichier);
		
		while($ligne){
	
			
			//traiter la ligne (éclater les infos dans un tableau
			
			$tab = explode (',', $ligne);
                        print_r($tab);
			
			//construire l'insert de la ligne dans la table
			$req= 'insert into eleve(nom, prenom, idFiliere, idClasse, idOption, anneeDiplome, adresseEmail) values (:nom, :prenom, :idFiliere, :idClasse, :idOption, :anneeDiplome, :adresseEmail);';
			$requete_preparee=$connnexion->prepare($req);
			$requete_execute (array( ':nom ' $tab[1], ':prenom' $tab[2], ':idFiliere' -> 2, ':idClasse' -> 1, ':idOption'->0, ':anneeDiplome', ':adresseEmail')
			echo $req;
			//inserer dans la table (exécuter l'ordre insert)
			try{
				$result=$connexion->exec($req); 
			}
			catch(Exception $e){
		echo 'Erreur : '.$e->getMessage().'<br />';  
		echo 'N° : '.$e->getCode();
	}
			  // lire la ligne suivante du fichier
			$ligne = fgets($monfichier);
		}
//faire une boucle (tant que non fin de fichier)
	}  
   
//fin if ($connexion)	
?>


<form name="saisie" method="post" action="./index.php?page=recupAgents" onSubmit="return verifSaisie(this);"> 
	url du fichier à créer  : <input type="text" name="nomfic" value="
<?php 
 if(!empty($_POST['nomfic']) ) { 
	echo htmlspecialchars($_POST['nomfic'], ENT_QUOTES);
 } 
?>
"/><br/>
<input type="submit" name="valider" value="ok"/>
</form>
<br/><br/>
<script>
function verifSaisie(monForm) {
	alert("verifier extension pbm");
	monForm.nomfic.focus();
	ok=true;
	return ok;
}
</script>