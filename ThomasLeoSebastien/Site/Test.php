<?php
$filename="Test_Publipostage.rtf";
if(file_exists($filename)){

	$fp = fopen ($filename, 'r');
	$content = fread($fp, filesize($filename));
	echo "Le fichier a été lu";
	
	fclose ($fp); 
 
 //On remplace les champs automatiques du modèle
$content=str_replace("Raison_Sociale", "Test1", $content);
$content=str_replace("Adresse1", "20 rue des paqueretes", $content);
$content=str_replace("Adresse2", "...", $content);
$content=str_replace("Adresse3", "...", $content);
$content=str_replace("12345", "95130", $content);
$content=str_replace("Ville", "Franconville", $content);

echo $content;
	$fp = fopen('mon_fichier.doc', 'w');
	fwrite($fp, $content); 
 	fclose($fp); 
}
?>