## Teil 1: Datenbank deployen
```
# Erstelle das Datenbank Passwort als Secret
$ rk create secret generic database-credentials --from-literal=password=123

# Datenbank starten
$ rk create -f statefulset.yaml

# Statefulset ansehen
$ rk describe statefulset database

# PersistentVolumeClaim ansehen
$ rk get persistentvolumeclaim
$ rk describe persistentvolumeclaim data-database-0
```

## Teil 2: Deployment updaten
```
# Neue Konfiguration starten
$ rk replace -f deployment.yaml
```
