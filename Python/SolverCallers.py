#!/usr/bin/env python3

import Constants as Constants
import Solvers as Solvers
import FunctionCallers as FunctionCallers


def malthus():
    return Solvers.rungeKutta4V1(
        FunctionCallers.callMalthus,
        Constants.INITIAL_NUMBER_OF_PREYS,
        0,
        Constants.DURATION,
        Constants.STEP
    )


def verhulst():
    return Solvers.rungeKutta4V1(
        FunctionCallers.callVerhulst,
        Constants.INITIAL_NUMBER_OF_PREYS,
        0,
        Constants.DURATION,
        Constants.STEP
    )


def lotkaVolterraMalthus():
    return Solvers.rungeKutta4V2(
        FunctionCallers.callLotkaVolterraPrey,
        FunctionCallers.callLotkaVolterraPredator,
        Constants.INITIAL_NUMBER_OF_PREYS,
        Constants.INITIAL_NUMBER_OF_PREDATORS,
        0,
        Constants.DURATION,
        Constants.STEP
    )


def lotkaVolterraVerhulst():
    return Solvers.rungeKutta4V2(
        FunctionCallers.callLotkaVolterraVerhulstPrey,
        FunctionCallers.callLotkaVolterraVerhulstPredator,
        Constants.INITIAL_NUMBER_OF_PREYS,
        Constants.INITIAL_NUMBER_OF_PREDATORS,
        0,
        Constants.DURATION,
        Constants.STEP
    )