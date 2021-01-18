#!/usr/bin/env python3

from math import exp

import Constants as Constants


def malthus(number_of_individuals:float):
    return Constants.PREY_GROWTH_RATE * number_of_individuals

def malthusMortality(number_of_individuals:float):
    return -Constants.PREDATOR_MORTALITY_RATE * number_of_individuals



def verhulst(number_of_individuals:float):
    return Constants.PREY_GROWTH_RATE * number_of_individuals * (1 - number_of_individuals / Constants.ENVIRONMENTAL_CAPACITY)

def verhulstMortality(number_of_individuals:float):
    return -Constants.PREDATOR_MORTALITY_RATE * number_of_individuals * (1 + number_of_individuals / Constants.ENVIRONMENTAL_CAPACITY)



def lotkaVolterraPrey(number_of_preys:float, number_of_predators:float):
    return malthus(number_of_preys) - Constants.PREDATOR_PREDATION_RATE * number_of_preys * number_of_predators

def lotkaVolterraPredator(number_of_preys:float, number_of_predators:float):
    return malthusMortality(number_of_predators) + Constants.PREDATOR_GROWTH_RATE * number_of_preys * number_of_predators



def lotkaVolterraVerhulstPrey(number_of_preys:float, number_of_predators:float):
    return verhulst(number_of_preys) - Constants.PREDATOR_PREDATION_RATE * number_of_preys * number_of_predators

def lotkaVolterraVerhulstPredator(number_of_preys:float, number_of_predators:float):
    return verhulstMortality(number_of_predators) + Constants.PREDATOR_GROWTH_RATE * number_of_preys * number_of_predators



# def gausePrey(number_of_preys:float, number_of_predators:float):
#     return malthus(number_of_preys) - (number_of_preys ** Constants.PREDATOR_SATIETY) * number_of_predators


# def hollingIIPrey(number_of_preys:float, number_of_predators:float):
#     return verhulst(number_of_preys) - (Constants.PREDATION_RATE_PER_UNIT_OF_TIME * number_of_preys * number_of_predators)/(1 + Constants.PREDATION_RATE_PER_UNIT_OF_TIME * Constants.CAPTURE_TIME * number_of_preys)

# def hollingIIPredator(number_of_preys:float, number_of_predators:float):
#     return -Constants.PREDATOR_MORTALITY_RATE * number_of_predators + (Constants.SEARCH_TIME * Constants.PREDATION_RATE_PER_UNIT_OF_TIME * number_of_preys * number_of_predators)/(1 + Constants.PREDATION_RATE_PER_UNIT_OF_TIME * number_of_preys * number_of_predators)



# def hollingIIIPrey(number_of_preys:float, number_of_predators:float):
#     return verhulst(number_of_preys) - (Constants.PREDATION_RATE_PER_UNIT_OF_TIME * number_of_preys**2 * number_of_predators)/(1 + Constants.PREDATION_RATE_PER_UNIT_OF_TIME * Constants.CAPTURE_TIME * number_of_preys**2)

# def hollingIIIPredator(number_of_preys:float, number_of_predators:float):
#     return -Constants.PREDATOR_MORTALITY_RATE * number_of_predators + (Constants.SEARCH_TIME * Constants.PREDATION_RATE_PER_UNIT_OF_TIME * number_of_preys**2 * number_of_predators)/(1 + Constants.PREDATION_RATE_PER_UNIT_OF_TIME * number_of_preys**2 * number_of_predators)





def malthusAnalytic(time:float):
    return Constants.INITIAL_NUMBER_OF_PREYS * exp(Constants.PREY_GROWTH_RATE * time)





def lotkaVolterraFunctionalResponse(number_of_preys:float, number_of_predators:float):
    return Constants.PREDATOR_PREDATION_RATE * number_of_preys * number_of_predators

def gauseFunctionalResponse(number_of_preys:float, number_of_predators:float):
    return (number_of_preys ** Constants.PREDATOR_SATIETY) * number_of_predators

def hollingIIFunctionalResponse(number_of_preys:float, number_of_predators:float):
    return (Constants.PREDATION_RATE_PER_UNIT_OF_TIME * number_of_preys * number_of_predators) / (1 + Constants.PREDATION_RATE_PER_UNIT_OF_TIME * Constants.CAPTURE_TIME * number_of_preys)

def hollingIIIFunctionalResponse(number_of_preys:float, number_of_predators:float):
    return (Constants.PREDATION_RATE_PER_UNIT_OF_TIME * number_of_preys ** 2 * number_of_predators) / (1 + Constants.PREDATION_RATE_PER_UNIT_OF_TIME * Constants.CAPTURE_TIME * number_of_preys ** 2)