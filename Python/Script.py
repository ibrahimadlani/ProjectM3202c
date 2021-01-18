#!/usr/bin/env python3

import SolverCallers as SolverCallers
from Readers import read
from Writers import write


def execute(models:dict):
    time:list = []
    malthus_values: list = []
    malthus_time: list = []
    verhulst_values: list = []
    verhulst_time: list = []
    lotka_volterra_malthus_preys: list = []
    lotka_volterra_malthus_predators: list = []
    lotka_volterra_malthus_time: list = []
    lotka_volterra_verhulst_preys: list = []
    lotka_volterra_verhulst_predators: list = []
    lotka_volterra_verhulst_time: list = []

    if models.get("malthus"):
        print("malthus OK")
        malthus_values, malthus_time = SolverCallers.malthus()

    if models.get("verhulst"):
        print("verhulst OK")
        verhulst_values, verhulst_time = SolverCallers.verhulst()

    if models.get("lotka_volterra"):
        print("lotka_volterra OK")
        if (models.get("malthus") and not models.get("verhulst")) or (models.get("malthus") and models.get("verhulst")): # Que malthus ou malthus ET verhulst
            print("lotka_volterra_malthus OK")
            lotka_volterra_malthus_preys, lotka_volterra_malthus_predators, lotka_volterra_malthus_time = SolverCallers.lotkaVolterraMalthus()

        if (not models.get("malthus") and models.get("verhulst")) or (models.get("malthus") and models.get("verhulst")): # Que verhulst ou malthus ET verhulst
            print("lotka_volterra_verhulst OK")
            lotka_volterra_verhulst_preys, lotka_volterra_verhulst_predators, lotka_volterra_verhulst_time = SolverCallers.lotkaVolterraVerhulst()

    if models.get("malthus"): time = malthus_time
    else: time = verhulst_time

    return time, malthus_values, verhulst_values, lotka_volterra_malthus_preys, lotka_volterra_malthus_predators, lotka_volterra_verhulst_preys, lotka_volterra_verhulst_predators


models = read()

time, malthus_values, verhulst_values, lotka_volterra_malthus_preys, lotka_volterra_malthus_predators, lotka_volterra_verhulst_preys, lotka_volterra_verhulst_predators = execute(models)
write(time, malthus_values, verhulst_values, lotka_volterra_malthus_preys, lotka_volterra_malthus_predators, lotka_volterra_verhulst_preys, lotka_volterra_verhulst_predators)