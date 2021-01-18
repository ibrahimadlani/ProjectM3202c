#!/usr/bin/env python3

import Functions as Functions
import Constants as Constants


def callMalthus(number_of_individuals:float, step:float):
    result = Functions.malthus(number_of_individuals)
    if number_of_individuals + step * result < 0:
        return (0 - number_of_individuals) / step
    else:
        return result


def callVerhulst(number_of_individuals:float, step:float):
    result = Functions.verhulst(number_of_individuals)
    if number_of_individuals + step * result < 0:
        return (0 - number_of_individuals) / step
    elif number_of_individuals + step * result > Constants.ENVIRONMENTAL_CAPACITY:
        return (Constants.ENVIRONMENTAL_CAPACITY - number_of_individuals) / step
    else:
        return result


def callLotkaVolterraPrey(number_of_preys:float, number_of_predators:float, step:float):
    result = Functions.lotkaVolterraPrey(number_of_preys, number_of_predators)
    if number_of_preys + step * result < 0:
        return (0 - number_of_preys) / step
    else:
        return result


def callLotkaVolterraPredator(number_of_preys:float, number_of_predators:float, step:float):
    result = Functions.lotkaVolterraPredator(number_of_preys, number_of_predators)
    if number_of_predators + step * result < 0:
        return (0 - number_of_preys) / step
    else:
        return result


def callLotkaVolterraVerhulstPrey(number_of_preys:float, number_of_predators:float, step:float):
    result = Functions.lotkaVolterraVerhulstPrey(number_of_preys, number_of_predators)
    if number_of_preys + step * result < 0:
        return (0 - number_of_preys) / step
    elif number_of_preys + step * result > Constants.ENVIRONMENTAL_CAPACITY:
        return (Constants.ENVIRONMENTAL_CAPACITY - number_of_preys) / step
    else:
        return result

def callLotkaVolterraVerhulstPredator(number_of_preys:float, number_of_predators:float, step:float):
    result = Functions.lotkaVolterraVerhulstPredator(number_of_preys, number_of_predators)
    if number_of_predators + step * result < 0:
        return (0 - number_of_preys) / step
    else:
        return result

# def callGausePrey(number_of_preys:float, number_of_predators:float, step:float):
#     result = Functions.gausePrey(number_of_preys, number_of_predators)
#     if number_of_preys + step * result < 0:
#         return (0 - number_of_preys) / step
#     elif number_of_preys + step * result > Constants.ENVIRONMENTAL_CAPACITY:
#         return (Constants.ENVIRONMENTAL_CAPACITY - number_of_preys) / step
#     else:
#         return result


# def callHollingIIPrey(number_of_preys:float, number_of_predators:float, step:float):
#     result = Functions.hollingIIPrey(number_of_preys, number_of_predators)
#     if number_of_preys + step * result < 0:
#         return (0 - number_of_preys) / step
#     elif number_of_preys + step * result > Constants.ENVIRONMENTAL_CAPACITY:
#         return (Constants.ENVIRONMENTAL_CAPACITY - number_of_preys) / step
#     else:
#         return result


# def callHollingIIPredator(number_of_preys:float, number_of_predators:float, step:float):
#     result = Functions.hollingIIPredator(number_of_preys, number_of_predators)
#     if number_of_preys + step * result < 0:
#         return (0 - number_of_preys) / step
#     else:
#         return result