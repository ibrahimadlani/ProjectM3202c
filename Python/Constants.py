#!/usr/bin/env python3

# general_parameters

DURATION:int = 100
STEP = 0.05

# specific_parameters for 1 population

ENVIRONMENTAL_CAPACITY:int = 1000 # K

# specific_parameters for 2 populations

INITIAL_NUMBER_OF_PREYS:int = 5 # x(0)
INITIAL_NUMBER_OF_PREDATORS:int = 2 # y(0)

PREY_GROWTH_RATE:float = 0.5 # a, r
PREDATOR_PREDATION_RATE:float = 0.05 # b
PREDATOR_MORTALITY_RATE:float = 0.75 # c
PREDATOR_GROWTH_RATE:float = 0.05 # d

PREDATOR_SATIETY:float = 0.5 # g

SEARCH_TIME:float = 0.75 # alpha
CAPTURE_TIME:float = 0.25 # bêta
PREDATION_RATE_PER_UNIT_OF_TIME:float = 0.5 # B