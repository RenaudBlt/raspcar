<?php 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=vehicule;charset=utf8', 'admin', 'renaud');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$data = array();
$result1 = $bdd->query('SELECT * FROM essence ORDER BY date DESC');
$results = $result1->fetchAll();
$date = "";
$km = "";
	foreach($results as $result){
		$date .=  "\"".$result['date']."\", ";
		$km .= "\"".$result['km_parcouru']."\", ";
	}
	echo $date;
	echo $km;

/*
	while($km = $result2->fetch()){
		echo "\"".$km['km_parcouru']."\", ";
	}
*/
?>