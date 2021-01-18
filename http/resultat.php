<?php
session_start();

// CONDITIONEL POUR EVITER L'ACCES RESULTATS SANS INPUTS
if (!isset($_SESSION["JSON"])) {header("Location: index.php?erreur=emptyvars");exit;}

// $jsonoutput EST LE JSON DES RESULTATS
$jsonoutput = file_get_contents('../output.json');

// $jsoninput EST LE JSON DES VARIABLES D'ENTRÉS
$jsoninput = $_SESSION["JSON"];

// $json EST LE JSON DES RESULTATS CONVERTIE EN PHP-POO
$json = json_encode($jsonoutput);

// CHARGEMENT ARTIFICIEL DE 2.5s POUR EVITER QUE LE PHP DEMARRE AVANT LE SCRIPT PYTHON
sleep(2.5);

//while(){
//    sleep(2.5);
//}

// INCLUSION DU HEADER
include("includes/header.inc.php");
?>
    <header class="container text-center">
        <img src="img/pictures/logo2.png" class="image-fluid mt-3" id="titre" alt="">
        <p class="lead">
            <!-- Sous-titre dynamique en fonction du choix des modèles -->
            <small>
                <?php if ($jsoninput->models->malthus) echo "Malthus ";
                if ($jsoninput->models->verhulst) echo "Verhulst ";
                if ($jsoninput->models->lotka_volterra) echo "Lotka-Volterra"; ?>
            </small>
        </p>
        <hr>
    </header>
    <main class="container text-center">
        <canvas id="myChart" height="100"></canvas>
        <hr>
        <div class="row">

            <!-- Liste des paramètres generaux -->
            <div class="col-12 col-md-6">
                <h4>Paramètres génériques</h4>
                <hr>
                <ul class="container text-start">
                    <?php include("includes/generalparams.inc.php");?>
                </ul>
            </div>
            <hr class="d-md-none">
            <div class="col-12 col-md-6">

                <!-- Liste des paramètres spécifiques -->
                <h4>Paramètres spécifiques</h4>
                <hr>
                <ul class="container text-start">
                    <?php include("includes/specificparams.inc.php");?>
                </ul>
            </div>
        </div>
        <hr>

        <!-- Boutton de retour à la page d'accueil -->
        <button class="btn btn-outline-light" onclick="window.location.href = 'index.php';" data-toggle="modal" data-target="#staticBackdrop" data-toggle="modal" data-target="#staticBackdrop"><b>RETOUR </b><i class="fas fa-undo-alt"></i></button>
    </main>

    <!-- Recuperation des donnée du PHP au JavaScript-->
    <script>var json = <?php echo $jsonoutput ?>;</script>
    
    <script src="js/chartScript.js"></script>
<?php 
// INCLUSION DU HEADER
include("includes/header.inc.php");
?>