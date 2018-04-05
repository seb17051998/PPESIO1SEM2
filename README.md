# PPESIO1SEM2
PPE (Projet Personnalisés Encadrés)  du 2ème semestre en 1ère année de BTS SIO dont il y a mon CV que j'ai fait en HTML, ThomasLeoSebastion/Site est un site sur l'administration du lycée fait en groupe de 3 personnes dont on gère avec des formulaires les classes, la liste des élèves, la liste des entreprises et la liste des stages avec le nom de l'élève

## ThomasLeoSebastien (Site sur l'administration du lycée) fait en groupe ##

### Architecture du site ###

![architecturesite.PNG](https://github.com/seb17051998/PPESIO1SEM2/blob/master/ThomasLeoSebastien/Site/Photos/architecturesite.PNG)

### Schéma de la base de donnée et modèle logique de données ###

![schemabdd.PNG](https://github.com/seb17051998/PPESIO1SEM2/blob/master/ThomasLeoSebastien/Site/Photos/schemabdd.PNG)

* ENTREPRISE (idEntreprise, nomEntreprise, secteurActivite, adresseEntreprise, villeEntreprise, cpEntreprise, numTelentreprise)
* ELEVE (idEleve, nomEleve, prenomEleve, optionEleve, nomClasse, emailEleve)
* CLASSE (idClasse, nomClasse)
* STAGE (idStage, nomEleve, prenomEleve, nomClasse, nomEntreprise, dateRDVStage)

### Répartition des tâches ###

|**Léo**|**Sébastien**|**Thomas**|
|-------|-------------|----------|
|  CSS  | Formulaire principal, codage PHP | Base de données |
| Aide sur le formulaire | Tableau | Aide sur le formulaire | 

### Développement ###

Contrôleur : index.php

VUES :
> accueil.php
> classes.php
> eleves.php
> enTete.php
> entreprises.php
> erreur.php
> menu.php
> pied.php
> Publipostage.php
> recuperationeleves.php
> stages.php

PROCEDURE ET FONCTIONS :
> fct.inc.php

IMAGE DE FOND DU SITE : 

![lycee.png](https://github.com/seb17051998/PPESIO1SEM2/blob/master/ThomasLeoSebastien/Site/Photos/lycee.PNG)
