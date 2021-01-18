#!/usr/bin/env python3

import csv
import json

def writeInJSON(
        time:list,
        malthus:list,
        verhulst:list,
        lotka_volterra_malthus_preys:list,
        lotka_volterra_malthus_predators:list,
        lotka_volterra_verhulst_preys:list,
        lotka_volterra_verhulst_predators:list,
):
    with open("../../output.json", "w") as file: #juste ../output.json si lancement depuis IDE
        data = {}

        data["time"] = time
        data["malthus"] = malthus
        data["verhulst"] = verhulst
        data["lotka_volterra_malthus_preys"] = lotka_volterra_malthus_preys
        data["lotka_volterra_malthus_predators"] = lotka_volterra_malthus_predators
        data["lotka_volterra_verhulst_preys"] = lotka_volterra_verhulst_preys
        data["lotka_volterra_verhulst_predators"] = lotka_volterra_verhulst_predators

        json.dump(data, file)


def write(
        time:list,
        malthus:list,
        verhulst:list,
        lotka_volterra_malthus_preys:list,
        lotka_volterra_malthus_predators:list,
        lotka_volterra_verhulst_preys:list,
        lotka_volterra_verhulst_predators:list,
):
    writeInJSON(
        time,
        malthus,
        verhulst,
        lotka_volterra_malthus_preys,
        lotka_volterra_malthus_predators,
        lotka_volterra_verhulst_preys,
        lotka_volterra_verhulst_predators
    )