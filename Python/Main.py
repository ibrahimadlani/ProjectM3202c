#!/usr/bin/env python3

import pylab as graph

import Constants as Constants
import Solvers as Solvers
import FunctionCallers as FunctionCallers
from Functions import malthusAnalytic, lotkaVolterraFunctionalResponse, gauseFunctionalResponse, hollingIIFunctionalResponse, hollingIIIFunctionalResponse


t0 = 0
tf = Constants.DURATION
s = Constants.STEP


def affichageModeles2Populations(
        solver1,
        solver2,
        functionPrey,
        functionPredator,
        initialSizePrey:float,
        initialSizePredator:float,
        title:str,
        fileName:str,
        displayPrey:bool,
        displayPredator:bool,
        displayTitle:bool,
        saveFile:bool):
    if solver1 is not None or solver2 is not None:
        if solver1 is not None:
            X1, Y1, T1 = solver1(functionPrey, functionPredator, initialSizePrey, initialSizePredator, t0, tf, s)
            if displayPrey: graph.plot(T1, X1, label=solver1.__name__+" proie")
            if displayPredator: graph.plot(T1, Y1, label=solver1.__name__+" prédateur")
        if solver2 is not None:
            X2, Y2, T2 = solver2(functionPrey, functionPredator, initialSizePrey, initialSizePredator, t0, tf, s)
            if displayPrey: graph.plot(T2, X2, label=solver2.__name__+" proie")
            if displayPredator: graph.plot(T2, Y2, label=solver2.__name__+" prédateur")
    if displayTitle:
        graph.title(
            title+"\n"+
            "Conditions initiales : "+str(initialSizePrey)+" proies, "+str(initialSizePredator)+" prédateurs, "+str(tf-t0)+" années"
        )
    graph.xlabel("Temps d'étude (en années)")
    graph.ylabel("Population (en unités)")
    graph.legend()

    if saveFile: graph.savefig(fileName, dpi=500)
    graph.show()


def affichageModeles1Population(
        solver1,
        solver2,
        function,
        initialSize:float,
        title:str,
        fileName:str,
        displayTitle:bool,
        saveFile:bool):
    if solver1 is not None or solver2 is not None:
        if solver1 is not None:
            X1, T1 = solver1(function, initialSize, t0, tf, s)
            graph.plot(T1, X1, label=solver1.__name__)
        if solver2 is not None:
            X2, T2 = solver2(function, initialSize, t0, tf, s)
            graph.plot(T2, X2, label=solver2.__name__)
    if displayTitle:
        graph.title(
            title+"\n"+
            "Conditions initiales : "+str(initialSize)+" individus, "+str(tf-t0)+" années"
        )
    graph.xlabel("Temps d'étude (en années)")
    graph.ylabel("Population (en unités)")
    graph.legend()

    if saveFile: graph.savefig(fileName, dpi=500)
    graph.show()


def affichageComparaisonAnalytiqueApproximee(
        solver1,
        solver2,
        function1,
        function2,
        title:str,
        fileName:str,
        displayTitle:bool,
        saveFile:bool):
    X1, T1 = solver1(function1, t0, tf, s)
    X2, T2 = solver2(function2, Constants.INITIAL_NUMBER_OF_PREYS, t0, tf, s)
    graph.plot(T1, X1, label=solver1.__name__)
    graph.plot(T2, X2, label=solver2.__name__)
    if displayTitle:
        graph.title(
            title+"\n"+
            "Conditions initiales : "+str(Constants.INITIAL_NUMBER_OF_PREYS)+" individus, "+str(tf-t0)+" années"
        )
    graph.xlabel("Temps d'étude (en années)")
    graph.ylabel("Population (en unités)")
    graph.legend()

    if saveFile: graph.savefig(fileName, dpi=500)
    graph.show()


def affichageReponseFonctionnelle(
        solver,
        function,
        title:str,
        fileName:str,
        displayTitle:bool,
        saveFile:bool):
    R, T = solver(function, t0, tf, s)
    graph.plot(T, R)
    if displayTitle:
        graph.title(
            title + "\n" +
            "Conditions initiales : " + str(tf - t0) + " années"
        )
    graph.xlabel("Temps d'étude (en années)")
    graph.ylabel("Quantité de proies dévorées (en unités)")

    if saveFile: graph.savefig(fileName, dpi=500)
    graph.show()





# Comparaison de Euler et Runge-Kutta sur Malthus
affichageModeles1Population(
    Solvers.eulerV1,
    None,
    FunctionCallers.callMalthus,
    Constants.INITIAL_NUMBER_OF_PREYS,
    "Évolution d'une population suivant Malthus (Euler)",
    "Malthus_Euler",
    True,
    False
)
affichageModeles1Population(
    None,
    Solvers.rungeKutta4V1,
    FunctionCallers.callMalthus,
    Constants.INITIAL_NUMBER_OF_PREYS,
    "Évolution d'une population suivant Malthus (RK4)",
    "Malthus_Runge-Kutta_4",
    True,
    False
)
affichageModeles1Population(
    Solvers.eulerV1,
    Solvers.rungeKutta4V1,
    FunctionCallers.callMalthus,
    Constants.INITIAL_NUMBER_OF_PREYS,
    "Comparaison entre Euler et RK4 sur Malthus",
    "Malthus_Euler_X_Runge-Kutta_4",
    True,
    False
)



# Comparaison de Euler et Runge-Kutta sur Verhulst
affichageModeles1Population(
    Solvers.eulerV1,
    None,
    FunctionCallers.callVerhulst,
    Constants.INITIAL_NUMBER_OF_PREYS,
    "Évolution d'une population suivant Verhulst (Euler)",
    "Verhulst_Euler",
    True,
    False
)
affichageModeles1Population(
    None,
    Solvers.rungeKutta4V1,
    FunctionCallers.callVerhulst,
    Constants.INITIAL_NUMBER_OF_PREYS,
    "Évolution d'une population suivant Verhulst (RK4)",
    "Verhulst_Runge-Kutta_4",
    True,
    False
)
affichageModeles1Population(
    Solvers.eulerV1,
    Solvers.rungeKutta4V1,
    FunctionCallers.callVerhulst,
    Constants.INITIAL_NUMBER_OF_PREYS,
    "Comparaison entre Euler et RK4 sur Verhulst",
    "Verhulst_Euler_X_Runge-Kutta_4",
    True,
    False
)



# Comparaison de Euler et Runge-Kutta sur Lotka-Volterra
affichageModeles2Populations(
    Solvers.eulerV2,
    None,
    FunctionCallers.callLotkaVolterraPrey,
    FunctionCallers.callLotkaVolterraPredator,
    Constants.INITIAL_NUMBER_OF_PREYS,
    Constants.INITIAL_NUMBER_OF_PREDATORS,
    "Évolution de deux populations suivant Lotka-Volterra (Euler)",
    "Lotka-Volterra_Euler",
    True,
    True,
    True,
    False
)
affichageModeles2Populations(
    None,
    Solvers.rungeKutta4V2,
    FunctionCallers.callLotkaVolterraPrey,
    FunctionCallers.callLotkaVolterraPredator,
    Constants.INITIAL_NUMBER_OF_PREYS,
    Constants.INITIAL_NUMBER_OF_PREDATORS,
    "Évolution de deux populations suivant Lotka-Volterra (RK4)",
    "Lotka-Volterra_Runge-Kutta_4",
    True,
    True,
    True,
    False
)
affichageModeles2Populations(
    Solvers.eulerV2,
    Solvers.rungeKutta4V2,
    FunctionCallers.callLotkaVolterraPrey,
    FunctionCallers.callLotkaVolterraPredator,
    Constants.INITIAL_NUMBER_OF_PREYS,
    Constants.INITIAL_NUMBER_OF_PREDATORS,
    "Comparaison entre Euler et RK4 sur Lotka-Volterra (proie)",
    "Lotka-Volterra_Euler_X_Runge-Kutta_4_Proie",
    True,
    False,
    True,
    False
)
affichageModeles2Populations(
    Solvers.eulerV2,
    Solvers.rungeKutta4V2,
    FunctionCallers.callLotkaVolterraPrey,
    FunctionCallers.callLotkaVolterraPredator,
    Constants.INITIAL_NUMBER_OF_PREYS,
    Constants.INITIAL_NUMBER_OF_PREDATORS,
    "Comparaison entre Euler et RK4 sur Lotka-Volterra (prédateur)",
    "Lotka-Volterra_Euler_X_Runge-Kutta_4_Predateurs",
    False,
    True,
    True,
    False
)
affichageModeles2Populations(
    Solvers.eulerV2,
    Solvers.rungeKutta4V2,
    FunctionCallers.callLotkaVolterraPrey,
    FunctionCallers.callLotkaVolterraPredator,
    Constants.INITIAL_NUMBER_OF_PREYS,
    Constants.INITIAL_NUMBER_OF_PREDATORS,
    "Comparaison entre Euler et RK4 sur Lotka-Volterra (proie & prédateur)",
    "Lotka-Volterra_Euler_X_Runge-Kutta_4",
    True,
    True,
    True,
    False
)



# Comparaison de la méthode Analytique avec Euler et Runge-Kutta d'ordre 4 sur Malthus
affichageComparaisonAnalytiqueApproximee(
    Solvers.analytic,
    Solvers.eulerV1,
    malthusAnalytic,
    FunctionCallers.callMalthus,
    "Comparaison entre méthode analytique et Euler sur Malthus",
    "Malthus_Analitic_X_Euler",
    True,
    False
)
affichageComparaisonAnalytiqueApproximee(
    Solvers.analytic,
    Solvers.rungeKutta4V1,
    malthusAnalytic,
    FunctionCallers.callMalthus,
    "Comparaison entre méthode analytique et RK4 sur Malthus",
    "Malthus_Analitic_X_Runge-Kutta_4",
    True,
    False
)





# # TESTS Affichage Gause, Holling II et Holling III
# affichageModeles2Populations(
#     Solvers.rungeKutta4V2,
#     None,
#     FunctionCallers.callGausePrey,
#     FunctionCallers.callLotkaVolterraPredator,
#     Constants.INITIAL_NUMBER_OF_PREYS,
#     Constants.INITIAL_NUMBER_OF_PREDATORS,
#     "Évolution de deux populations suivant Gause",
#     None,
#     True,
#     True,
#     True,
#     False
# )
# affichageModeles2Populations(
#     Solvers.rungeKutta4V2,
#     None,
#     FunctionCallers.callHollingIIPrey,
#     FunctionCallers.callHollingIIPredator,
#     Constants.INITIAL_NUMBER_OF_PREYS,
#     Constants.INITIAL_NUMBER_OF_PREDATORS,
#     "Évolution de deux populations suivant HollingII",
#     None,
#     True,
#     True,
#     True,
#     False
# )
# affichageModeles2Populations(
#     Solvers.rungeKutta4V2,
#     None,
#     FunctionCallers.callHollingIIIPrey,
#     FunctionCallers.callHollingIIIPredator,
#     Constants.INITIAL_NUMBER_OF_PREYS,
#     Constants.INITIAL_NUMBER_OF_PREDATORS,
#     "Évolution de deux populations suivant HollingIII",
#     None,
#     True,
#     True,
#     True,
#     False
# )





# Affichage réponse fonctionnelle Lotka-Volterra, Gause, Holling II et Holling III
affichageReponseFonctionnelle(
    Solvers.functionalResponse,
    lotkaVolterraFunctionalResponse,
    "Réponse fonctionnelle de Lotka-Volterra",
    "Reaction_Lotka-Volterra",
    True,
    False
)
affichageReponseFonctionnelle(
    Solvers.functionalResponse,
    gauseFunctionalResponse,
    "Réponse fonctionnelle de Gause",
    "Reaction_Gause",
    True,
    False
)
affichageReponseFonctionnelle(
    Solvers.functionalResponse,
    hollingIIFunctionalResponse,
    "Réponse fonctionnelle de HollingII",
    "Reaction_HollingII",
    True,
    False
)
affichageReponseFonctionnelle(
    Solvers.functionalResponse,
    hollingIIIFunctionalResponse,
    "Réponse fonctionnelle de HollingIII",
    "Reaction_HollingIII",
    True,
    False
)