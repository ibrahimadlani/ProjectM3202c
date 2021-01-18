#!/usr/bin/env python3

def eulerV1(f, x0:float, t0:float, tf:float, s:float):
    Lx = [x0]
    Lt = [t0]
    x = x0
    t = t0

    while t+s <= tf:
        x = x + s * f(x, s)
        t = t + s

        Lx.append(x)
        Lt.append(t)
    return Lx, Lt


def eulerV2(f, g, x0:float, y0:float, t0:float, tf:float, s:float):
    Lx = [x0]
    Ly = [y0]
    Lt = [t0]
    x = x0
    y = y0
    t = t0

    while t+s <= tf:
        x = x + s * f(x, y, s)
        y = y + s * g(x, y, s)

        t = t + s
        Lx.append(x)
        Ly.append(y)
        Lt.append(t)
    return Lx, Ly, Lt


def rungeKutta4V1(f, x0:float, t0:float, tf:float, s:float):
    Lx = [x0]
    Lt = [t0]
    x = x0
    t = t0

    while t+s <= tf:
        k1 = f(x, s)
        k2 = f(x + s * k1 / 2, s)
        k3 = f(x + s * k2 / 2, s)
        k4 = f(x + s * k3, s)

        x = x + s * (k1 + 2 * k2 + 2 * k3 + k4) / 6
        t = t + s

        Lx.append(x)
        Lt.append(t)

    return Lx, Lt


def rungeKutta4V2(f, g, x0:float, y0:float, t0:float, tf:float, s:float):
    Lx = [x0]
    Ly = [y0]
    Lt = [t0]
    x = x0
    y = y0
    t = t0

    while t+s <= tf:
        k1 = f(x, y, s)
        l1 = g(x, y, s)

        k2 = f(x + (s * k1) / 2, y + (s * l1) / 2, s)
        l2 = g(x + (s * k1) / 2, y + (s * l1) / 2, s)

        k3 = f(x + (s * k2) / 2, y + (s * l2) / 2, s)
        l3 = g(x + (s * k2) / 2, y + (s * l2) / 2, s)

        k4 = f(x + s * k3, y + s * l3, s)
        l4 = g(x + s * k3, y + s * l3, s)

        x = x + s * (k1 + 2 * k2 + 2 * k3 + k4) / 6
        y = y + s * (l1 + 2 * l2 + 2 * l3 + l4) / 6
        t = t + s

        Lx.append(x)
        Ly.append(y)
        Lt.append(t)

    return Lx, Ly, Lt


def analytic(f, t0:float, tf:float, s:float):
    Lt = [t0 + i * s for i in range(int((tf-t0) / s + 1))]
    Lx = [f(t) for t in Lt]

    return Lx, Lt


def functionalResponse(f, t0: float, tf: float, s: float):
    Lt = [t0]
    Lr = [0]
    t = t0
    y = 1

    while t + s <= tf:
        k1 = f(t, y)
        k2 = f(t + s * k1 / 2, y)
        k3 = f(t + s * k2 / 2, y)
        k4 = f(t + s * k3, y)

        r = s * (k1 + 2 * k2 + 2 * k3 + k4) / 6
        t = t + s

        Lr.append(r)
        Lt.append(t)

    return Lr, Lt