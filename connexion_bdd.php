<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=vehicule;charset=utf8', 'admin', 'renaud');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>