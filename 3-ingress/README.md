## Webseite ohne Tunnel verfügbar machen
```
# Ersetze alle "<your-fullname>" Textteile durch den eigenen Namen (wie Namespace)
$ vim ingress.yaml

# Erstelle eine Regel für eingehenden Traffic (Virtual name based hosting)
$ rk create -f ingress.yaml

# Ingress Regel ansehen
$ rk describe ingress kitty
```
Nun sollte der Service nach ein paar Minuten über den Browser erreichbar sein ("https" nicht vergessen). 

Evtl. ist ein Löschen des DNS Cache notwendig mit:
```
sudo killall -HUP mDNSResponder
```
