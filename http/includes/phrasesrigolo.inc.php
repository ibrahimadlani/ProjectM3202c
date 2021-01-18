<?php

$phrasesrigolos = [
    "Veuillez patientez que Tristan fasse les caluls de tête...",
    "J'espère que Phillipe n'est pas derrière cet écran...",
    "Préparation des graphiques de qualité BFMTV...",
    "Attends juste deux seconde beau gosse..."
  ];
  $x = random_int(0,sizeof($phrasesrigolos)-1);
echo  $phrasesrigolos[$x];