<?php
session_start();

// RECUPERATION DE LA CHAINE DE CARACTÈRE JSON ENVOYÉ PAR LE BOUTTON
$json = $_POST["JSON"];

// STOCKAGE DE LA VERSION PHP-POO du "input.json"
$_SESSION["JSON"] = json_decode($json);

// CONDITIONEL POUR EVITER L'ACCES AU CODE SOURCE
if (!isset($json )) {header("Location: ../index.php?erreur=noaccess");exit;}

// NETTOYAGE DE LA VARIABLE $_POST
unset($_POST["JSON"]);

// ECRITURE DU FICHIER 'input.json'
$input_json = fopen("../../input.json", "w") or die("Unable to open file!");
fwrite($input_json, $json);


// ROUTAGE VERS LA PAGE RESULTAT
header("Location: ../resultat.php");

// DEMARAGE DU SCRIPT PYTHON QUI VA REMPLIR "output.json" (Ce qui est dans la fonction escapeshellcmd(); est a modifer)
$command = escapeshellcmd('python3 ../../Python/Script.py');
$output = shell_exec($command);


