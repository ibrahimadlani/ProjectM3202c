<?php

if ($jsoninput->models->malthus && !$jsoninput->models->verhulst && !$jsoninput->models->lotka_volterra) {
    echo "<li><b>Population initale de proies</b> : " . $jsoninput->specific_parameters->INITIAL_NUMBER_OF_PREYS . "</li>";
    echo "<li><b>Taux de croissance des proies</b> : " . $jsoninput->specific_parameters->PREY_GROWTH_RATE . "</li>";
} elseif (!$jsoninput->models->malthus && $jsoninput->models->verhulst && !$jsoninput->models->lotka_volterra) {
    echo "<li><b>Population initale de proies</b> : " . $jsoninput->specific_parameters->INITIAL_NUMBER_OF_PREYS . "</li>";
    echo "<li><b>Taux de croissance des proies</b> : " . $jsoninput->specific_parameters->PREY_GROWTH_RATE . "</li>";
    echo "<li><b>Capacité de l'environement</b> : " . $jsoninput->specific_parameters->ENVIRONMENTAL_CAPACITY . "</li>";
} elseif ($jsoninput->models->malthus && $jsoninput->models->verhulst && !$jsoninput->models->lotka_volterra) {
    echo "<li><b>Population initale de proies</b> : " . $jsoninput->specific_parameters->INITIAL_NUMBER_OF_PREYS . "</li>";
    echo "<li><b>Taux de croissance des proies</b> : " . $jsoninput->specific_parameters->PREY_GROWTH_RATE . "</li>";
    echo "<li><b>Capacité de l'environement</b> : " . $jsoninput->specific_parameters->ENVIRONMENTAL_CAPACITY . "</li>";
} elseif ($jsoninput->models->malthus && !$jsoninput->models->verhulst && $jsoninput->models->lotka_volterra) {
    echo "<li><b>Population initale de proies</b> : " . $jsoninput->specific_parameters->INITIAL_NUMBER_OF_PREYS . "</li>";
    echo "<li><b>Population initale de prédateurs</b> : " . $jsoninput->specific_parameters->INITIAL_NUMBER_OF_PREDATORS . "</li>";
    echo "<li><b>Taux de croissance des proies</b> : " . $jsoninput->specific_parameters->PREY_GROWTH_RATE . "</li>";
    echo "<li><b>Taux de croissance des prédateurs</b> : " . $jsoninput->specific_parameters->PREDATOR_GROWTH_RATE . "</li>";
    echo "<li><b>Taux de predation des prédateurs</b> : " . $jsoninput->specific_parameters->PREDATOR_PREDATION_RATE . "</li>";
    echo "<li><b>Taux de mortalité des prédateurs</b> : " . $jsoninput->specific_parameters->PREDATOR_MORTALITY_RATE . "</li>";
    echo "<li><b>Capacité de l'environement</b> : " . $jsoninput->specific_parameters->ENVIRONMENTAL_CAPACITY . "</li>";
} elseif (!$jsoninput->models->malthus && $jsoninput->models->verhulst && $jsoninput->models->lotka_volterra) {
    echo "<li><b>Population initale de proies</b> : " . $jsoninput->specific_parameters->INITIAL_NUMBER_OF_PREYS . "</li>";
    echo "<li><b>Population initale de prédateurs</b> : " . $jsoninput->specific_parameters->INITIAL_NUMBER_OF_PREDATORS . "</li>";
    echo "<li><b>Taux de croissance des proies</b> : " . $jsoninput->specific_parameters->PREY_GROWTH_RATE . "</li>";
    echo "<li><b>Taux de croissance des prédateurs</b> : " . $jsoninput->specific_parameters->PREDATOR_GROWTH_RATE . "</li>";
    echo "<li><b>Taux de predation des prédateurs</b> : " . $jsoninput->specific_parameters->PREDATOR_PREDATION_RATE . "</li>";
    echo "<li><b>Taux de mortalité des prédateurs</b> : " . $jsoninput->specific_parameters->PREDATOR_MORTALITY_RATE . "</li>";
    echo "<li><b>Capacité de l'environement</b> : " . $jsoninput->specific_parameters->ENVIRONMENTAL_CAPACITY . "</li>";
} elseif ($jsoninput->models->malthus && $jsoninput->models->verhulst && $jsoninput->models->lotka_volterra) {
    echo "<li><b>Population initale de proies</b> : " . $jsoninput->specific_parameters->INITIAL_NUMBER_OF_PREYS . "</li>";
    echo "<li><b>Population initale de prédateurs</b> : " . $jsoninput->specific_parameters->INITIAL_NUMBER_OF_PREDATORS . "</li>";
    echo "<li><b>Taux de croissance des proies</b> : " . $jsoninput->specific_parameters->PREY_GROWTH_RATE . "</li>";
    echo "<li><b>Taux de croissance des prédateurs</b> : " . $jsoninput->specific_parameters->PREDATOR_GROWTH_RATE . "</li>";
    echo "<li><b>Taux de predation des prédateurs</b> : " . $jsoninput->specific_parameters->PREDATOR_PREDATION_RATE . "</li>";
    echo "<li><b>Taux de mortalité des prédateurs</b> : " . $jsoninput->specific_parameters->PREDATOR_MORTALITY_RATE . "</li>";
    echo "<li><b>Capacité de l'environement</b> : " . $jsoninput->specific_parameters->ENVIRONMENTAL_CAPACITY . "</li>";
}