// FONCTION QUI ARONDI LES VALEURS DE LA LISTE "time"//
//function ceilTime(timeRaw) {
//    var time = [];
//   for (var index = 0; index < timeRaw.length; index++) {
//        time.push(Math.ceil(timeRaw[index]));
//    }
//    return time;
//  }

// DECLARATION DES VARIABLES //
var obj = {
    type: 'line',
    color: '#d0cdc8',
    data: {
        labels: json.time,
        datasets: []
    },
    options: {
        scales: {
            xAxes: [{
                gridLines: {
                    display: true ,
                    color: "#383735"
                  },
                ticks: {
                    beginAtZero: true
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Temps d\'étude (en année)'
                }
            }],
                yAxes: [{
                    gridLines: {
                        display: true ,
                        color: "#383735"
                      },
                    ticks: {
                        beginAtZero: true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Effectif de la population (en unité)'
                    }}]

        }
    }
};

var malthus = {
    label: 'Malthus',
    data: json.malthus,
    backgroundColor: [
        'rgba(255, 99, 132, 0.2)'
    ],
    borderColor: [
        'rgba(255, 99, 132, 1)'
    ],
    borderWidth: 1
};

var verhulst = {
    label: 'Verhulst',
    data: json.verhulst,
    backgroundColor: [

        'rgba(54, 162, 235, 0.2)'
    ],
    borderColor: [
        'rgba(54, 162, 235, 1)'
    ],
    borderWidth: 1
};

var lvmprey = {
    label: '[L-V] Proies',
    data: json.lotka_volterra_malthus_preys,
    backgroundColor: [

        'rgba(255, 206, 86, 0.2)'
    ],
    borderColor: [

        'rgba(255, 206, 86, 0.8)'
    ],
    borderWidth: 1
};

var lvmpredator = {
    label: '[L-V & Malthus] Prédateurs',
    data: json.lotka_volterra_malthus_predators,
    backgroundColor: [

        'rgba(255, 206, 86, 0.4)'
    ],
    borderColor: [

        'rgba(255, 206, 86, 1)'
    ],
    borderWidth: 1
};

var lvvprey = {
    label: '[L-V & Verhulst] Proies',
    data: json.lotka_volterra_verhulst_preys,
    backgroundColor: [

        'rgba(153, 102, 255, 0.2)'
    ],
    borderColor: [

        'rgba(153, 102, 255, 0.8)'
    ],
    borderWidth: 1
};

var lvvpredator = {
    label: '[L-V & Verhulst] Prédateurs',
    data: json.lotka_volterra_verhulst_predators,
    backgroundColor: [

        'rgba(153, 102, 255, 0.4)'
    ],
    borderColor: [

        'rgba(153, 102, 255, 0.8)'
    ],
    borderWidth: 1
}



// AFFICHAGE DES COURBES EN FONCTION DE LEUR PRESENCES DANS LES CHOIX DES MODELS //
function chartPreparation() {
    if (json.malthus.length != 0 && json.verhulst.length != 0) {
        obj.data.datasets.push(malthus);
        obj.data.datasets.push(verhulst);
        if (json.lotka_volterra_malthus_predators.length != 0 && json.lotka_volterra_malthus_preys.length != 0 && json.lotka_volterra_verhulst_predators.length != 0 && json.lotka_volterra_verhulst_preys.length != 0) {
            obj.data.datasets.push(lvmpredator);
            obj.data.datasets.push(lvmprey);
            obj.data.datasets.push(lvvpredator);
            obj.data.datasets.push(lvvprey);}
    }else if (json.malthus.length != 0) {
        obj.data.datasets.push(malthus);
        if (json.lotka_volterra_malthus_predators.length != 0 && json.lotka_volterra_malthus_preys.length != 0 && json.lotka_volterra_verhulst_predators.length != 0 && json.lotka_volterra_verhulst_preys.length != 0) {
            obj.data.datasets.push(lvmpredator);
            obj.data.datasets.push(lvmprey);
            obj.data.datasets.push(lvvpredator);
            obj.data.datasets.push(lvvprey);
        }else if (json.lotka_volterra_malthus_predators.length,json.lotka_volterra_malthus_preys.length != 0) {
            obj.data.datasets.push(lvmpredator);
            obj.data.datasets.push(lvmprey);
        }else if (json.lotka_volterra_verhulst_predators.length,json.lotka_volterra_verhulst_preys.length != 0) {
            obj.data.datasets.push(lvvpredator);
            obj.data.datasets.push(lvvprey);
        }
    }else if (json.verhulst.length != 0) {
        obj.data.datasets.push(verhulst);
        if (json.lotka_volterra_malthus_predators.length != 0 && json.lotka_volterra_malthus_preys.length != 0 && json.lotka_volterra_verhulst_predators.length != 0 && json.lotka_volterra_verhulst_preys.length != 0) {
            obj.data.datasets.push(lvmpredator);
            obj.data.datasets.push(lvmprey);
            obj.data.datasets.push(lvvpredator);
            obj.data.datasets.push(lvvprey);
        }else if (json.lotka_volterra_malthus_predators.length,json.lotka_volterra_malthus_preys.length != 0) {
            obj.data.datasets.push(lvmpredator);
            obj.data.datasets.push(lvmprey);
        }else if (json.lotka_volterra_verhulst_predators.length,json.lotka_volterra_verhulst_preys.length != 0) {
            obj.data.datasets.push(lvvpredator);
            obj.data.datasets.push(lvvprey);
        }
    }
}



chartPreparation();


var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, obj);
Chart.defaults.global.defaultFontColor = '#979797';
