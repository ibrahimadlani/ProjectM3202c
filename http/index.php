<?php
session_start();

// NETTOYAGE DE LA VARIABLE DE SESSION 'JSON'
unset($_SESSION['JSON']);

// INCLUSION DU HEADER
include("includes/header.inc.php");
?>

    <header class="container text-center">
        <img src="img/pictures/logo2.png" class="image-fluid mt-3" id="titre" alt="">
        <p class="lead"><small>Simulation de modèles</small></p>
        <hr>
        <!-- Choix des équations (3 Checkbox)-->
        <div class="btn-group d-flex justify-content-center" id="groupe" data-toggle="buttons">
            <label class="btn">
                <span class="d-block">MALTHUS</span>
                <input type="checkbox" name="" id="malthusinput" autocomplete="off" value="true">
            </label>
            <label class="btn">
                <span class="d-block">VERHULST</span>
                <input type="checkbox" name="" id="verhulstinput" autocomplete="off" value="true">
            </label>
            <label class="btn">
                <span class="d-none d-md-block">LOTKA-VOLTERRA</span>
                <span class="d-block d-md-none">LOT.-VOL.</span>
                <input type="checkbox" name="" id="lotka_volterrainput" autocomplete="off" value="true">
            </label>
        </div>
        <hr>
    </header>
     <main class="container text-center mb-3">
        <!-- Message de champs vide -->
        <div class="row" id="selectsmthn">
            
            <!-- Message erreur PHP -->
            <?php if ($_GET["erreur"]=="emptyvars") echo "<div class='alert alert-danger' role='alert'>Vous ne pouvez pas acceder au résultat si vous n'avez pas entré de variables :/</div>"; ?>   
            <?php if($_GET["erreur"]=="noaccess") echo "<div class='alert alert-danger' role='alert'>Vous ne pouvez pas acceder à ce script PHP :/</div>"; ?>

            <h1 class="lead mt-5">Pour commencer, selectionez un ou plusieurs modèles ci-dessus.</h1>
        </div>

        <!-- Message de Lotka-Volterra inssufisant -->
        <div class="d-none row" id="selectsmthnmore">
            <h1 class="lead mt-5">Pour utiliser <b>Lotka-Volterra</b>, vous devez selectioner l'une de ses dépendences (<b>Malthus</b>, <b>Verhulst</b> ou les deux)</h1>
        </div>
        <!-- FORMULAIRE #1 (Malthus) -->
        <div class="d-none" id="form1">
            <h4>PARAMETRES GENERIQUES</h4>
            <hr>
            <div class="row">

                <!-- Durée -->
                <label for="DURATION">Durée</label>
                <div id="DURATION">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="500" value="100" class="slider" name="DURATION" id="DURATIONinput1" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">100</p>
                    </div>
                </div>

                <!-- Nombre de mesure -->
                <label for="NUMBER_OF_MEASURES_PER_TIME_UNIT">Nombre de mesures par unité de temps</label>
                <div id="NUMBER_OF_MEASURES_PER_TIME_UNIT">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="50" value="20" class="slider" name="NUMBER_OF_MEASURES_PER_TIME_UNIT" id="NUMBER_OF_MEASURES_PER_TIME_UNITinput1" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">20</p>
                    </div>
                </div>

                <hr>

                <h4>PARAMETRES SPECIFIQUES</h4>
                <hr>

                <!-- Population initale de proies -->
                <label for="INITIAL_NUMBER_OF_PREYS">Population initale</label>
                <div id="INITIAL_NUMBER_OF_PREYS">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="1000" value="10" class="slider" name="INITIAL_NUMBER_OF_PREYS" id="INITIAL_NUMBER_OF_PREYSinput1" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">10</p>
                    </div>
                </div>

                <!-- Taux de croissance des proies-->
                <label for="PREY_GROWTH_RATE">Taux de croissance</label>
                <div id="PREY_GROWTH_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.5" class="slider" name="PREY_GROWTH_RATE" id="PREY_GROWTH_RATEinput1" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.5</p>
                    </div>
                </div>

                <hr>

                <div class="row">

                    <!-- Envoie de la chaine de caractère correspondant au fichier JSON -->
                    <form action="includes/sendInputs.inc.php" method="post" class=" col-6"><button class="btn btn-outline-light" onclick="getInputValues();" name="JSON" value="" type="submit" id="btn" data-toggle="modal" data-target="#staticBackdrop" data-toggle="modal" data-target="#staticBackdrop"><b>SOUMETTRE </b><i class="fa fa-paper-plane" aria-hidden="true"></i></button></form>

                    <!-- Reinitialiser les champs -->
                    <div class="col-6"><button class="btn btn-outline-light" onclick="reinitInputField();"><b>REINITIALISER </b><i class="fas fa-retweet"></i></button></div>
                </div>
            </div>
        </div>

        <!-- FORMULAIRE #2 (Verhulst) -->
        <div class="d-none" id="form2">
            <h4>PARAMETRES GENERIQUES</h4>
            <hr>
            <div class="row">

                <!-- Durée -->
                <label for="DURATION">Durée</label>
                <div id="DURATION">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="500" value="100" class="slider" name="DURATION" id="DURATIONinput2" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">100</p>
                    </div>
                </div>

                <!-- Nombre de mesure -->
                <label for="NUMBER_OF_MEASURES_PER_TIME_UNIT">Nombre de mesures par unité de temps</label>
                <div id="NUMBER_OF_MEASURES_PER_TIME_UNIT">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="50" value="20" class="slider" name="NUMBER_OF_MEASURES_PER_TIME_UNIT" id="NUMBER_OF_MEASURES_PER_TIME_UNITinput2" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">20</p>
                    </div>
                </div>

                <hr>

                <h4>PARAMETRES SPECIFIQUES</h4>
                <hr>

                <!-- Population initale de proies -->
                <label for="INITIAL_NUMBER_OF_PREYS">Population initale</label>
                <div id="INITIAL_NUMBER_OF_PREYS">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="1000" value="10" class="slider" name="INITIAL_NUMBER_OF_PREYS" id="INITIAL_NUMBER_OF_PREYSinput2" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">10</p>
                    </div>
                </div>

                <!-- Taux de croissance des proies-->
                <label for="PREY_GROWTH_RATE">Taux de croissance</label>
                <div id="PREY_GROWTH_RATE">
                    <div class="row">
                        <input class="col-11" type="range"  min="0" max="1" step="0.0001"  value="0.5" class="slider" name="PREY_GROWTH_RATE" id="PREY_GROWTH_RATEinput2" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.5</p>
                    </div>
                </div>

                <!-- Capacité de l'environement -->
                <label for="ENVIRONMENTAL_CAPACITY">Capacité de l'environement</label>
                <div id="ENVIRONMENTAL_CAPACITY">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1000000" value="1000" class="slider" name="ENVIRONMENTAL_CAPACITY" id="ENVIRONMENTAL_CAPACITYinput2" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">1000</p>
                    </div>
                </div>

                <hr>

                <div class="row">

                    <!-- Envoie de la chaine de caractère correspondant au fichier JSON -->
                    <form action="includes/sendInputs.inc.php" method="post" class=" col-6"><button class="btn btn-outline-light" onclick="getInputValues();" name="JSON" value="" type="submit" id="btn" data-toggle="modal" data-target="#staticBackdrop"><b>SOUMETTRE </b><i class="fa fa-paper-plane" aria-hidden="true"></i></button></form>

                    <!-- Reinitialiser les champs -->
                    <div class="col-6"><button class="btn btn-outline-light" onclick="reinitInputField();"><b>REINITIALISER </b><i class="fas fa-retweet"></i></button></div>
                </div>
            </div>
        </div>

        <!-- FORMULAIRE #3 (Malthus & Verhulst) -->
        <div class="d-none" id="form3">
            <h4>PARAMETRES GENERIQUES</h4>
            <hr>
            <div class="row">

                <!-- Durée -->
                <label for="DURATION">Durée</label>
                <div id="DURATION">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="500" value="100" class="slider" name="DURATION" id="DURATIONinput3" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">100</p>
                    </div>
                </div>

                <!-- Nombre de mesure -->
                <label for="NUMBER_OF_MEASURES_PER_TIME_UNIT">Nombre de mesures par unité de temps</label>
                <div id="NUMBER_OF_MEASURES_PER_TIME_UNIT">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="50" value="20" class="slider" name="NUMBER_OF_MEASURES_PER_TIME_UNIT" id="NUMBER_OF_MEASURES_PER_TIME_UNITinput3" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">20</p>
                    </div>
                </div>

                <hr>

                <h4>PARAMETRES SPECIFIQUES</h4>
                <hr>

                <!-- Population initale de proies -->
                <label for="INITIAL_NUMBER_OF_PREYS">Population initale</label>
                <div id="INITIAL_NUMBER_OF_PREYS">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="1000" value="10" class="slider" name="INITIAL_NUMBER_OF_PREYS" id="INITIAL_NUMBER_OF_PREYSinput3" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">10</p>
                    </div>
                </div>

                <!-- Taux de croissance des proies-->
                <label for="PREY_GROWTH_RATE">Taux de croissance</label>
                <div id="PREY_GROWTH_RATE">
                    <div class="row">
                        <input class="col-11" type="range"  min="0" max="1" step="0.0001"  value="0.5" class="slider" name="PREY_GROWTH_RATE" id="PREY_GROWTH_RATEinput3" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.5</p>
                    </div>
                </div>

                <!-- Capacité de l'environement -->
                <label for="ENVIRONMENTAL_CAPACITY">Capacité de l'environement</label>
                <div id="ENVIRONMENTAL_CAPACITY">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1000000" value="1000" class="slider" name="ENVIRONMENTAL_CAPACITY" id="ENVIRONMENTAL_CAPACITYinput3" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">1000</p>
                    </div>
                </div>

                <hr>

                <div class="row">

                    <!-- Envoie de la chaine de caractère correspondant au fichier JSON -->
                    <form action="includes/sendInputs.inc.php" method="post" class=" col-6"><button class="btn btn-outline-light" onclick="getInputValues();" name="JSON" value="" type="submit" id="btn" data-toggle="modal" data-target="#staticBackdrop"><b>SOUMETTRE </b><i class="fa fa-paper-plane" aria-hidden="true"></i></button></form>

                    <!-- Reinitialiser les champs -->
                    <div class="col-6"><button class="btn btn-outline-light" onclick="reinitInputField();"><b>REINITIALISER </b><i class="fas fa-retweet"></i></button></div>
                </div>
            </div>
        </div>

        <!-- FORMULAIRE #4 (Malthus & Lotka-Volterra) -->
        <div class="d-none" id="form4">
            <h4>PARAMETRES GENERIQUES</h4>
            <hr>
            <div class="row">

                <!-- Durée -->
                <label for="DURATION">Durée</label>
                <div id="DURATION">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="500" value="100" class="slider" name="DURATION" id="DURATIONinput4" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">100</p>
                    </div>
                </div>

                <!-- Nombre de mesure -->
                <label for="NUMBER_OF_MEASURES_PER_TIME_UNIT">Nombre de mesures par unité de temps</label>
                <div id="NUMBER_OF_MEASURES_PER_TIME_UNIT">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="50" value="20" class="slider" name="NUMBER_OF_MEASURES_PER_TIME_UNIT" id="NUMBER_OF_MEASURES_PER_TIME_UNITinput4" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">20</p>
                    </div>
                </div>

                <hr>

                <h4>PARAMETRES SPECIFIQUES</h4>
                <hr>

                <!-- Population initale de proies -->
                <label for="INITIAL_NUMBER_OF_PREYS">Population initale de proies</label>
                <div id="INITIAL_NUMBER_OF_PREYS">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="1000" value="10" class="slider" name="INITIAL_NUMBER_OF_PREYS" id="INITIAL_NUMBER_OF_PREYSinput4" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">10</p>
                    </div>
                </div>

                <!-- Population initale de prédateurs -->
                <label for="INITIAL_NUMBER_OF_PREDATORS">Population initale de prédateurs</label>
                <div id="INITIAL_NUMBER_OF_PREDATORS">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1000" value="3" class="slider" name="INITIAL_NUMBER_OF_PREDATORS" id="INITIAL_NUMBER_OF_PREDATORSinput4" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">3</p>
                    </div>
                </div>

                <!-- Taux de croissance des proies-->
                <label for="PREY_GROWTH_RATE">Taux de croissance des proies</label>
                <div id="PREY_GROWTH_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.5" class="slider" name="PREY_GROWTH_RATE" id="PREY_GROWTH_RATEinput4" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.5</p>
                    </div>
                </div>

                <!-- Taux de croissance des proies -->
                <label for="PREDATOR_GROWTH_RATE">Taux de croissance des prédateurs</label>
                <div id="PREDATOR_GROWTH_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.05" class="slider " name="PREDATOR_GROWTH_RATE" id="PREDATOR_GROWTH_RATEinput4" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.05</p>
                    </div>
                </div>

                <!-- Taux de predation des prédateurs -->
                <label for="PREDATOR_PREDATION_RATE">Taux de predation des prédateurs</label>
                <div id="PREDATOR_PREDATION_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.05" class="slider" name="PREDATOR_PREDATION_RATE" id="PREDATOR_PREDATION_RATEinput4" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.05</p>
                    </div>
                </div>

                <!-- Taux de mortalité des prédateurs -->
                <label for="PREDATOR_MORTALITY_RATE">Taux de mortalité des prédateurs</label>
                <div id="PREDATOR_MORTALITY_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.75" class="slider" name="PREDATOR_MORTALITY_RATE" id="PREDATOR_MORTALITY_RATEinput4" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.75</p>
                    </div>
                </div>

                <hr>

                <div class="row">

                    <!-- Envoie de la chaine de caractère correspondant au fichier JSON -->
                    <form action="includes/sendInputs.inc.php" method="post" class=" col-6"><button class="btn btn-outline-light" onclick="getInputValues();" name="JSON" value="" type="submit" id="btn" data-toggle="modal" data-target="#staticBackdrop"><b>SOUMETTRE </b><i class="fa fa-paper-plane" aria-hidden="true"></i></button></form>

                    <!-- Reinitialiser les champs -->
                    <div class="col-6"><button class="btn btn-outline-light" onclick="reinitInputField();"><b>REINITIALISER </b><i class="fas fa-retweet"></i></button></div>
                </div>
            </div>
        </div>

        <!-- FORMULAIRE #5 ( Verhulst & Lotka-Volterra) -->
        <div class="d-none" id="form5">
            <h4>PARAMETRES GENERIQUES</h4>
            <hr>
            <div class="row">

                <!-- Durée -->
                <label for="DURATION">Durée</label>
                <div id="DURATION">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="500" value="100" class="slider" name="DURATION" id="DURATIONinput5" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">100</p>
                    </div>
                </div>

                <!-- Nombre de mesure -->
                <label for="NUMBER_OF_MEASURES_PER_TIME_UNIT">Nombre de mesures par unité de temps</label>
                <div id="NUMBER_OF_MEASURES_PER_TIME_UNIT">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="50" value="20" class="slider" name="NUMBER_OF_MEASURES_PER_TIME_UNIT" id="NUMBER_OF_MEASURES_PER_TIME_UNITinput5" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">20</p>
                    </div>
                </div>

                <hr>

                <h4>PARAMETRES SPECIFIQUES</h4>
                <hr>

                <!-- Population initale de proies -->
                <label for="INITIAL_NUMBER_OF_PREYS">Population initale de proies</label>
                <div id="INITIAL_NUMBER_OF_PREYS">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="1000" value="10" class="slider" name="INITIAL_NUMBER_OF_PREYS" id="INITIAL_NUMBER_OF_PREYSinput5" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">10</p>
                    </div>
                </div>

                <!-- Population initale de prédateurs -->
                <label for="INITIAL_NUMBER_OF_PREDATORS">Population initale de prédateurs</label>
                <div id="INITIAL_NUMBER_OF_PREDATORS">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1000" value="3" class="slider" name="INITIAL_NUMBER_OF_PREDATORS" id="INITIAL_NUMBER_OF_PREDATORSinput5" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">3</p>
                    </div>
                </div>

                <!-- Taux de croissance des proies-->
                <label for="PREY_GROWTH_RATE">Taux de croissance des proies</label>
                <div id="PREY_GROWTH_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.5" class="slider" name="PREY_GROWTH_RATE" id="PREY_GROWTH_RATEinput5" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.5</p>
                    </div>
                </div>

                <!-- Taux de croissance des proies -->
                <label for="PREDATOR_GROWTH_RATE">Taux de croissance des prédateurs</label>
                <div id="PREDATOR_GROWTH_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.05" class="slider " name="PREDATOR_GROWTH_RATE" id="PREDATOR_GROWTH_RATEinput5" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.05</p>
                    </div>
                </div>

                <!-- Taux de predation des prédateurs -->
                <label for="PREDATOR_PREDATION_RATE">Taux de predation des prédateurs</label>
                <div id="PREDATOR_PREDATION_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.05" class="slider" name="PREDATOR_PREDATION_RATE" id="PREDATOR_PREDATION_RATEinput5" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.05</p>
                    </div>
                </div>

                <!-- Taux de mortalité des prédateurs -->
                <label for="PREDATOR_MORTALITY_RATE">Taux de mortalité des prédateurs</label>
                <div id="PREDATOR_MORTALITY_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.75" class="slider" name="PREDATOR_MORTALITY_RATE" id="PREDATOR_MORTALITY_RATEinput5" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.75</p>
                    </div>
                </div>

                <!-- Capacité de l'environement -->
                <label for="ENVIRONMENTAL_CAPACITY">Capacité de l'environement</label>
                <div id="ENVIRONMENTAL_CAPACITY">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1000000" value="1000" class="slider" name="ENVIRONMENTAL_CAPACITY" id="ENVIRONMENTAL_CAPACITYinput5" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">1000</p>
                    </div>
                </div>

                <hr>

                <div class="row">

                    <!-- Envoie de la chaine de caractère correspondant au fichier JSON -->
                    <form action="includes/sendInputs.inc.php" method="post" class=" col-6"><button class="btn btn-outline-light" onclick="getInputValues();" name="JSON" value="" type="submit" id="btn" data-toggle="modal" data-target="#staticBackdrop"><b>SOUMETTRE </b><i class="fa fa-paper-plane" aria-hidden="true"></i></button></form>

                    <!-- Reinitialiser les champs -->
                    <div class="col-6"><button class="btn btn-outline-light" onclick="reinitInputField();"><b>REINITIALISER </b><i class="fas fa-retweet"></i></button></div>
                </div>
            </div>
        </div>

        <!-- FORMULAIRE #5 ( Malthus, Verhulst & Lotka-Volterra) -->
        <div class="d-none" id="form6">
            <h4>PARAMETRES GENERIQUES</h4>
            <hr>
            <div class="row">

                <!-- Durée -->
                <label for="DURATION">Durée</label>
                <div id="DURATION">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="500" value="100" class="slider" name="DURATION" id="DURATIONinput6" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">100</p>
                    </div>
                </div>

                <!-- Nombre de mesure -->
                <label for="NUMBER_OF_MEASURES_PER_TIME_UNIT">Nombre de mesures par unité de temps</label>
                <div id="NUMBER_OF_MEASURES_PER_TIME_UNIT">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="50" value="20" class="slider" name="NUMBER_OF_MEASURES_PER_TIME_UNIT" id="NUMBER_OF_MEASURES_PER_TIME_UNITinput6" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">20</p>
                    </div>
                </div>

                <hr>

                <h4>PARAMETRES SPECIFIQUES</h4>
                <hr>

                <!-- Population initale de proies -->
                <label for="INITIAL_NUMBER_OF_PREYS">Population initale de proies</label>
                <div id="INITIAL_NUMBER_OF_PREYS">
                    <div class="row">
                        <input class="col-11" type="range" min="1" max="1000" value="10" class="slider" name="INITIAL_NUMBER_OF_PREYS" id="INITIAL_NUMBER_OF_PREYSinput6" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">10</p>
                    </div>
                </div>

                <!-- Population initale de prédateurs -->
                <label for="INITIAL_NUMBER_OF_PREDATORS">Population initale de prédateurs</label>
                <div id="INITIAL_NUMBER_OF_PREDATORS">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1000" value="3" class="slider" name="INITIAL_NUMBER_OF_PREDATORS" id="INITIAL_NUMBER_OF_PREDATORSinput6" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">3</p>
                    </div>
                </div>

                <!-- Taux de croissance des proies-->
                <label for="PREY_GROWTH_RATE">Taux de croissance des proies</label>
                <div id="PREY_GROWTH_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.5" class="slider" name="PREY_GROWTH_RATE" id="PREY_GROWTH_RATEinput6" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.5</p>
                    </div>
                </div>

                <!-- Taux de croissance des proies -->
                <label for="PREDATOR_GROWTH_RATE">Taux de croissance des prédateurs</label>
                <div id="PREDATOR_GROWTH_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.05" class="slider " name="PREDATOR_GROWTH_RATE" id="PREDATOR_GROWTH_RATEinput6" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.05</p>
                    </div>
                </div>

                <!-- Taux de predation des prédateurs -->
                <label for="PREDATOR_PREDATION_RATE">Taux de predation des prédateurs</label>
                <div id="PREDATOR_PREDATION_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.05" class="slider" name="PREDATOR_PREDATION_RATE" id="PREDATOR_PREDATION_RATEinput6" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.05</p>
                    </div>
                </div>

                <!-- Taux de mortalité des prédateurs -->
                <label for="PREDATOR_MORTALITY_RATE">Taux de mortalité des prédateurs</label>
                <div id="PREDATOR_MORTALITY_RATE">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1" step="0.0001" value="0.75" class="slider" name="PREDATOR_MORTALITY_RATE" id="PREDATOR_MORTALITY_RATEinput6" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">0.75</p>
                    </div>
                </div>

                <!-- Capacité de l'environement -->
                <label for="ENVIRONMENTAL_CAPACITY">Capacité de l'environement</label>
                <div id="ENVIRONMENTAL_CAPACITY">
                    <div class="row">
                        <input class="col-11" type="range" min="0" max="1000000" value="1000" class="slider" name="ENVIRONMENTAL_CAPACITY" id="ENVIRONMENTAL_CAPACITYinput6" oninput="this.nextElementSibling.innerText = this.value">
                        <p class="output col-1">1000</p>
                    </div>
                </div>

                <hr>

                <div class="row">

                    <!-- Envoie de la chaine de caractère correspondant au fichier JSON -->
                    <form action="includes/sendInputs.inc.php" method="post" class=" col-6"><button class="btn btn-outline-light" onclick="getInputValues();" name="JSON" value="" type="submit" id="btn" data-toggle="modal" data-target="#staticBackdrop"><b>SOUMETTRE </b><i class="fa fa-paper-plane" aria-hidden="true"></i></button></form>

                    <!-- Reinitialiser les champs -->
                    <div class="col-6"><button class="btn btn-outline-light" onclick="reinitInputField()"><b>REINITIALISER </b><i class="fas fa-retweet"></i></button></div>
                </div>
            </div>
        </div>

        <!-- MODALE DE CHARGEMENT -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog bg-dark">
                <div class="modal-content">
                    <div class="modal-body">
                    <h5 class="modal-title mx-auto" id="staticBackdrop">Chargement</h5>
                        <div class="d-flex align-items-center flex-column">

                            <strong><?php include("includes/phrasesrigolo.inc.php"); ?>   </strong>
                            <img src="img/pictures/loading2.gif" alt="" class="my-3 w-100">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
    </main>

<?php
// INCLUSION DU HEADER
include("includes/footer.inc.php");
?>