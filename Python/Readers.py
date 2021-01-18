#!/usr/bin/env python3

import csv
import json

import Constants as Constants

def readInJSON():
    with open("../../input.json", "r") as file: #juste ../input.json si lancement depuis IDE
        parameters = json.load(file)
        return parameters.get("general_parameters"), parameters.get("models"), parameters.get("specific_parameters")

def initializeJSON(general_parameters:dict, specific_parameters:dict):
    Constants.DURATION = general_parameters.get("DURATION")
    Constants.STEP = 1/general_parameters.get("NUMBER_OF_MEASURES_PER_TIME_UNIT")

    Constants.INITIAL_NUMBER_OF_PREYS = specific_parameters.get("INITIAL_NUMBER_OF_PREYS")
    Constants.PREY_GROWTH_RATE = specific_parameters.get("PREY_GROWTH_RATE")
    Constants.INITIAL_NUMBER_OF_PREDATORS = specific_parameters.get("INITIAL_NUMBER_OF_PREDATORS")
    Constants.PREDATOR_GROWTH_RATE = specific_parameters.get("PREDATOR_GROWTH_RATE")
    Constants.PREDATOR_PREDATION_RATE = specific_parameters.get("PREDATOR_PREDATION_RATE")
    Constants.PREDATOR_MORTALITY_RATE = specific_parameters.get("PREDATOR_MORTALITY_RATE")
    Constants.ENVIRONMENTAL_CAPACITY = specific_parameters.get("ENVIRONMENTAL_CAPACITY")


def read():
    general_parameters, models, specific_parameters = readInJSON()
    initializeJSON(general_parameters, specific_parameters)
    return models