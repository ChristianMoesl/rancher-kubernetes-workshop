## 1. Teil: Vorbereiten des Namespace in Rancher

```
# Richtiges Projekt auswählen (Workshop)
$ rancher context switch

# Eigenen Namespace erstellen
$ rancher namespace create <your-fullname>

# Shortcut für alle weiteren Kubernetes (=kubectl) Befehle erstellen,
# die wir in diesem Namespace ausführen wollen
$ alias rk='rancher kubectl --namespace <your-fullname>'
```

##  2. Teil: Pod erstellen
```
# Erstelle alle Resourcen im File pod.yaml
$ rk create -f pod.yaml

# Liste alle Pods:
$ rk get pods

# Sieh dir den Pod genauer an:
$ rk describe pod kitty
```

## 3. Teil: Tunnel zu Container aufbauen
```
# Einen Tunnel von localhost:8080 zu Port 80 in POD erstellen
$ rk port-forward pod/kitty 8080:80
```
Danach muss der der Container unter `localhost:8080` erreichbar sein und sollte ein "Hello World" ausgeben.

## 4.Teil: Fehlende Datei in Container kopieren
```
# Bild in Container kopieren
$ rk cp kitty.jpg kitty:/var/www/html/kitty.jpg

# Zur Sicherheit nachsehen ob es auch an der richtigen Stelle gelandet ist
$ rk exec -it kitty -- ls /var/www/html 
```
