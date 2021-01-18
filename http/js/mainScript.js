// DECLARATION DES VARIABLES //
var m = false;
var v = false;
var lv = false;

var inputArray = document.getElementsByClassName("col-11");
var outputArray = document.getElementsByClassName("output");

var buttonsSubmit = document.getElementsByClassName("btn btn-outline-light");

var defaultValuesInOrder = [100,20,10,0.5,   100,20,10,0.5,1000,   100,20,10,0.5,1000  ,100,20,10,3,0.5,0.5,0.5,0.75,100,20,10,3,0.5,0.05,0.05,0.75,1000,100,20,10,3,0.5,0.05,0.05,0.75,1000];

var inputRecorded = {
  general_parameters: {
    DURATION: 0,
    NUMBER_OF_MEASURES_PER_TIME_UNIT: 0,
  },
  models: {
    malthus: false,
    verhulst: false,
    lotka_volterra: false,
  },
  specific_parameters: {
    INITIAL_NUMBER_OF_PREYS: 0,
    PREY_GROWTH_RATE: 0,
    INITIAL_NUMBER_OF_PREDATORS: 0,
    PREDATOR_GROWTH_RATE: 0,
    PREDATOR_PREDATION_RATE: 0,
    PREDATOR_MORTALITY_RATE: 0,
    ENVIRONMENTAL_CAPACITY: 0,
  },
};

// FONCTION getInputValues(); SERT A RECCUPERER LES DONNÉES PERTINENTES DE TOUT LES RANGE SLIDERS EN FONCTION DES 3 CHECKBOX //
function setJsonButton(string) {
  for (var index = 0; index < buttonsSubmit.length; index++)
    buttonsSubmit[index].value = string;
}

// FONCTION getInputValues(); SERT A RECCUPERER LES DONNÉES PERTINENTES DE TOUT LES RANGE SLIDERS EN FONCTION DES 3 CHECKBOX //
function getInputValues() {
  // VERIFICATION DES CHECKBOX ET DEFINITION DES CHOIX DANS LE JSON //
  if (document.querySelector("#malthusinput:checked") !== null) {
    m = true;
  }
  if (document.querySelector("#verhulstinput:checked") !== null) {
    v = true;
  }
  if (document.querySelector("#lotka_volterrainput:checked") !== null) {
    lv = true;
  }

  // MALTHUS //
  if (
    document.querySelector("#malthusinput:checked") !== null &&
    document.querySelector("#verhulstinput:checked") == null &&
    document.querySelector("#lotka_volterrainput:checked") == null
  ) {
    inputRecorded = {
      general_parameters: {
        DURATION: parseFloat(document.getElementById("DURATIONinput1").value),
        NUMBER_OF_MEASURES_PER_TIME_UNIT: parseFloat(
          document.getElementById("NUMBER_OF_MEASURES_PER_TIME_UNITinput1")
            .value
        ),
      },
      models: {
        malthus: m,
        verhulst: v,
        lotka_volterra: lv,
      },
      specific_parameters: {
        INITIAL_NUMBER_OF_PREYS: parseFloat(
          document.getElementById("INITIAL_NUMBER_OF_PREYSinput1").value
        ),
        PREY_GROWTH_RATE: parseFloat(
          document.getElementById("PREY_GROWTH_RATEinput1").value
        ),
        INITIAL_NUMBER_OF_PREDATORS: 0,
        PREDATOR_GROWTH_RATE: 0,
        PREDATOR_PREDATION_RATE: 0,
        PREDATOR_MORTALITY_RATE: 0,
        ENVIRONMENTAL_CAPACITY: 0,
      },
    };
  }
  // VERHULST //
  else if (
    document.querySelector("#malthusinput:checked") == null &&
    document.querySelector("#verhulstinput:checked") !== null &&
    document.querySelector("#lotka_volterrainput:checked") == null
  ) {
    inputRecorded = {
      general_parameters: {
        DURATION: parseFloat(document.getElementById("DURATIONinput2").value),
        NUMBER_OF_MEASURES_PER_TIME_UNIT: parseFloat(
          document.getElementById("NUMBER_OF_MEASURES_PER_TIME_UNITinput2")
            .value
        ),
      },
      models: {
        malthus: m,
        verhulst: v,
        lotka_volterra: lv,
      },
      specific_parameters: {
        INITIAL_NUMBER_OF_PREYS: parseFloat(
          document.getElementById("INITIAL_NUMBER_OF_PREYSinput2").value
        ),
        PREY_GROWTH_RATE: parseFloat(
          document.getElementById("PREY_GROWTH_RATEinput2").value
        ),
        INITIAL_NUMBER_OF_PREDATORS: 0,
        PREDATOR_GROWTH_RATE: 0,
        PREDATOR_PREDATION_RATE: 0,
        PREDATOR_MORTALITY_RATE: 0,
        ENVIRONMENTAL_CAPACITY: parseFloat(
          document.getElementById("ENVIRONMENTAL_CAPACITYinput2").value
        ),
      },
    };
  }
  // MALTHUS & VERHULST //
  else if (
    document.querySelector("#malthusinput:checked") !== null &&
    document.querySelector("#verhulstinput:checked") !== null &&
    document.querySelector("#lotka_volterrainput:checked") == null
  ) {
    inputRecorded = {
      general_parameters: {
        DURATION: parseFloat(document.getElementById("DURATIONinput3").value),
        NUMBER_OF_MEASURES_PER_TIME_UNIT: parseFloat(
          document.getElementById("NUMBER_OF_MEASURES_PER_TIME_UNITinput3")
            .value
        ),
      },
      models: {
        malthus: m,
        verhulst: v,
        lotka_volterra: lv,
      },
      specific_parameters: {
        INITIAL_NUMBER_OF_PREYS: parseFloat(
          document.getElementById("INITIAL_NUMBER_OF_PREYSinput3").value
        ),
        PREY_GROWTH_RATE: parseFloat(
          document.getElementById("PREY_GROWTH_RATEinput3").value
        ),
        INITIAL_NUMBER_OF_PREDATORS: 0,
        PREDATOR_GROWTH_RATE: 0,
        PREDATOR_PREDATION_RATE: 0,
        PREDATOR_MORTALITY_RATE: 0,
        ENVIRONMENTAL_CAPACITY: parseFloat(
          document.getElementById("ENVIRONMENTAL_CAPACITYinput3").value
        ),
      },
    };
  }
  // MALTHUS & LOTKA-VOLTERRA //
  else if (
    document.querySelector("#malthusinput:checked") !== null &&
    document.querySelector("#verhulstinput:checked") == null &&
    document.querySelector("#lotka_volterrainput:checked") !== null
  ) {
    inputRecorded = {
      general_parameters: {
        DURATION: parseFloat(document.getElementById("DURATIONinput4").value),
        NUMBER_OF_MEASURES_PER_TIME_UNIT: parseFloat(
          document.getElementById("NUMBER_OF_MEASURES_PER_TIME_UNITinput4")
            .value
        ),
      },
      models: {
        malthus: m,
        verhulst: v,
        lotka_volterra: lv,
      },
      specific_parameters: {
        INITIAL_NUMBER_OF_PREYS: parseFloat(
          document.getElementById("INITIAL_NUMBER_OF_PREYSinput4").value
        ),
        PREY_GROWTH_RATE: parseFloat(
          document.getElementById("PREY_GROWTH_RATEinput4").value
        ),
        INITIAL_NUMBER_OF_PREDATORS: parseFloat(
          document.getElementById("INITIAL_NUMBER_OF_PREDATORSinput4").value
        ),
        PREDATOR_GROWTH_RATE: parseFloat(
          document.getElementById("PREDATOR_GROWTH_RATEinput4").value
        ),
        PREDATOR_PREDATION_RATE: parseFloat(
          document.getElementById("PREDATOR_PREDATION_RATEinput4").value
        ),
        PREDATOR_MORTALITY_RATE: parseFloat(
          document.getElementById("PREDATOR_MORTALITY_RATEinput4").value
        ),
        ENVIRONMENTAL_CAPACITY: 0,
      },
    };
  }
  // MALTHUS, VERHULST & LOTKA-VOLTERRA //
  else if (
    document.querySelector("#malthusinput:checked") !== null &&
    document.querySelector("#verhulstinput:checked") !== null &&
    document.querySelector("#lotka_volterrainput:checked") !== null
  ) {
    inputRecorded = {
      general_parameters: {
        DURATION: parseFloat(document.getElementById("DURATIONinput6").value),
        NUMBER_OF_MEASURES_PER_TIME_UNIT: parseFloat(
          document.getElementById("NUMBER_OF_MEASURES_PER_TIME_UNITinput6")
            .value
        ),
      },
      models: {
        malthus: m,
        verhulst: v,
        lotka_volterra: lv,
      },
      specific_parameters: {
        INITIAL_NUMBER_OF_PREYS: parseFloat(
          document.getElementById("INITIAL_NUMBER_OF_PREYSinput6").value
        ),
        PREY_GROWTH_RATE: parseFloat(
          document.getElementById("PREY_GROWTH_RATEinput6").value
        ),
        INITIAL_NUMBER_OF_PREDATORS: parseFloat(
          document.getElementById("INITIAL_NUMBER_OF_PREDATORSinput6").value
        ),
        PREDATOR_GROWTH_RATE: parseFloat(
          document.getElementById("PREDATOR_GROWTH_RATEinput6").value
        ),
        PREDATOR_PREDATION_RATE: parseFloat(
          document.getElementById("PREDATOR_PREDATION_RATEinput6").value
        ),
        PREDATOR_MORTALITY_RATE: parseFloat(
          document.getElementById("PREDATOR_MORTALITY_RATEinput6").value
        ),
        ENVIRONMENTAL_CAPACITY: parseFloat(
          document.getElementById("ENVIRONMENTAL_CAPACITYinput6").value
        ),
      },
    };
  }
  // VERHULST & LOTKA-VOLTERRA //
  else if (
    document.querySelector("#malthusinput:checked") == null &&
    document.querySelector("#verhulstinput:checked") !== null &&
    document.querySelector("#lotka_volterrainput:checked") !== null
  ) {
    inputRecorded = {
      general_parameters: {
        DURATION: parseFloat(document.getElementById("DURATIONinput5").value),
        NUMBER_OF_MEASURES_PER_TIME_UNIT: parseFloat(
          document.getElementById("NUMBER_OF_MEASURES_PER_TIME_UNITinput5")
            .value
        ),
      },
      models: {
        malthus: m,
        verhulst: v,
        lotka_volterra: lv,
      },
      specific_parameters: {
        INITIAL_NUMBER_OF_PREYS: parseFloat(
          document.getElementById("INITIAL_NUMBER_OF_PREYSinput5").value
        ),
        PREY_GROWTH_RATE: parseFloat(
          document.getElementById("PREY_GROWTH_RATEinput5").value
        ),
        INITIAL_NUMBER_OF_PREDATORS: parseFloat(
          document.getElementById("INITIAL_NUMBER_OF_PREDATORSinput5").value
        ),
        PREDATOR_GROWTH_RATE: parseFloat(
          document.getElementById("PREDATOR_GROWTH_RATEinput5").value
        ),
        PREDATOR_PREDATION_RATE: parseFloat(
          document.getElementById("PREDATOR_PREDATION_RATEinput5").value
        ),
        PREDATOR_MORTALITY_RATE: parseFloat(
          document.getElementById("PREDATOR_MORTALITY_RATEinput5").value
        ),
        ENVIRONMENTAL_CAPACITY: parseFloat(
          document.getElementById("ENVIRONMENTAL_CAPACITYinput5").value
        ),
      },
    };
  }
  // ENVOIE DU JSON DANS LE LE CHAMPS value="" DU BOUTTON #btn //
  setJsonButton(JSON.stringify(inputRecorded));
}

// GESTION D'AFFICHAGES DES 6 FORMULAIRES EN FONCTION DES 3 CHECKBOX //
function formsHiddener() {
  // AUCUN CHOIX //
  if (
    document.querySelector("#malthusinput:checked") == null &&
    document.querySelector("#verhulstinput:checked") == null &&
    document.querySelector("#lotka_volterrainput:checked") == null
  ) {
    document.getElementById("selectsmthnmore").classList.add("d-none");
    document.getElementById("selectsmthn").classList.remove("d-none");
    document.getElementById("form1").classList.add("d-none");
    document.getElementById("form2").classList.add("d-none");
    document.getElementById("form3").classList.add("d-none");
    document.getElementById("form4").classList.add("d-none");
    document.getElementById("form5").classList.add("d-none");
    document.getElementById("form6").classList.add("d-none");
  }
  // MALTHUS //
  else if (
    document.querySelector("#malthusinput:checked") !== null &&
    document.querySelector("#verhulstinput:checked") == null &&
    document.querySelector("#lotka_volterrainput:checked") == null
  ) {
    document.getElementById("selectsmthnmore").classList.add("d-none");
    document.getElementById("selectsmthn").classList.add("d-none");
    document.getElementById("form1").classList.remove("d-none");
    document.getElementById("form2").classList.add("d-none");
    document.getElementById("form3").classList.add("d-none");
    document.getElementById("form4").classList.add("d-none");
    document.getElementById("form5").classList.add("d-none");
    document.getElementById("form6").classList.add("d-none");
  }
  // VERHULST //
  else if (
    document.querySelector("#malthusinput:checked") == null &&
    document.querySelector("#verhulstinput:checked") !== null &&
    document.querySelector("#lotka_volterrainput:checked") == null
  ) {
    document.getElementById("selectsmthnmore").classList.add("d-none");
    document.getElementById("selectsmthn").classList.add("d-none");
    document.getElementById("form1").classList.add("d-none");
    document.getElementById("form2").classList.remove("d-none");
    document.getElementById("form3").classList.add("d-none");
    document.getElementById("form4").classList.add("d-none");
    document.getElementById("form5").classList.add("d-none");
    document.getElementById("form6").classList.add("d-none");
  }
  // MALTHUS & VERHULST //
  else if (
    document.querySelector("#malthusinput:checked") !== null &&
    document.querySelector("#verhulstinput:checked") !== null &&
    document.querySelector("#lotka_volterrainput:checked") == null
  ) {
    document.getElementById("selectsmthnmore").classList.add("d-none");
    document.getElementById("selectsmthn").classList.add("d-none");
    document.getElementById("form1").classList.add("d-none");
    document.getElementById("form2").classList.add("d-none");
    document.getElementById("form3").classList.remove("d-none");
    document.getElementById("form4").classList.add("d-none");
    document.getElementById("form5").classList.add("d-none");
    document.getElementById("form6").classList.add("d-none");
  }
  // MALTHUS & LOTKA-VOLTERRA //
  else if (
    document.querySelector("#malthusinput:checked") !== null &&
    document.querySelector("#verhulstinput:checked") == null &&
    document.querySelector("#lotka_volterrainput:checked") !== null
  ) {
    document.getElementById("selectsmthnmore").classList.add("d-none");
    document.getElementById("selectsmthn").classList.add("d-none");
    document.getElementById("form1").classList.add("d-none");
    document.getElementById("form2").classList.add("d-none");
    document.getElementById("form3").classList.add("d-none");
    document.getElementById("form4").classList.remove("d-none");
    document.getElementById("form5").classList.add("d-none");
    document.getElementById("form6").classList.add("d-none");
  }
  // MALTHUS, VERHULST & LOTKA-VOLTERRA //
  else if (
    document.querySelector("#malthusinput:checked") !== null &&
    document.querySelector("#verhulstinput:checked") !== null &&
    document.querySelector("#lotka_volterrainput:checked") !== null
  ) {
    document.getElementById("selectsmthnmore").classList.add("d-none");
    document.getElementById("selectsmthn").classList.add("d-none");
    document.getElementById("form1").classList.add("d-none");
    document.getElementById("form2").classList.add("d-none");
    document.getElementById("form3").classList.add("d-none");
    document.getElementById("form4").classList.add("d-none");
    document.getElementById("form5").classList.add("d-none");
    document.getElementById("form6").classList.remove("d-none");
  }
  // LOTKA-VOLTERRA INSSUFISANT //
  else if (
    document.querySelector("#malthusinput:checked") == null &&
    document.querySelector("#verhulstinput:checked") == null &&
    document.querySelector("#lotka_volterrainput:checked") !== null
  ) {
    document.getElementById("selectsmthnmore").classList.remove("d-none");
    document.getElementById("selectsmthn").classList.add("d-none");
    document.getElementById("form1").classList.add("d-none");
    document.getElementById("form2").classList.add("d-none");
    document.getElementById("form3").classList.add("d-none");
    document.getElementById("form4").classList.add("d-none");
    document.getElementById("form5").classList.add("d-none");
    document.getElementById("form6").classList.add("d-none");
  }
  // VERHULST & LOTKA-VOLTERRA //
  else if (
    document.querySelector("#malthusinput:checked") == null &&
    document.querySelector("#verhulstinput:checked") !== null &&
    document.querySelector("#lotka_volterrainput:checked") !== null
  ) {
    document.getElementById("selectsmthnmore").classList.add("d-none");
    document.getElementById("selectsmthn").classList.add("d-none");
    document.getElementById("form1").classList.add("d-none");
    document.getElementById("form2").classList.add("d-none");
    document.getElementById("form3").classList.add("d-none");
    document.getElementById("form4").classList.add("d-none");
    document.getElementById("form5").classList.remove("d-none");
    document.getElementById("form6").classList.add("d-none");
  }
}

// LISTENER DES CHECKBOX QUI APPELLE formsHiddener() A CHAQUE CLICK DANS LA ZONE DU GROUPE DE CHECKBOX //
document.getElementById("groupe").addEventListener("click", formsHiddener);


// FONCTION QUI GÈRE LA REINITIALISATION DES INPUT RANGE SLIDERS //
function reinitInputField() {
  // REINITIALISATION DES RANGE SLIDERS //
  for (var index = 0; index < inputArray.length; index++) {
    inputArray[index].value = defaultValuesInOrder[index];
  }
  // REINITIALISATION DES TEXTS OUTPUTS //
  for (var index = 0; index < inputArray.length; index++) {
    outputArray[index].innerText = defaultValuesInOrder[index];
  }
}



