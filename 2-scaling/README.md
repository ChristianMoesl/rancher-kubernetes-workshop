## 1. Teil: Skalieren
```
# clean up old stuff
$ rk delete pod kitty

# create a scalable Kubernetes deployment of kitten webservers
$ rk create -f deployment.yaml

# Deployment ansehen
$ rk describe deployment kitty

# Skaliere deine Anwendung 
$ rk scale --replicas=3 deployment kitty
```

## 2. Teil: Service ("Virtuellen Proxy") erstellen 
```
$ rk create -f service.yaml

$ rk describe service kitty

# Nun erstellen wir einen Tunnel zum Service!
$ rk port-forward service/kitty 8080:80
```

## 3. Teil: Image Version erhöhen
```
$ rk set image deployment kitty webserver=christianmoesl/rancher-kubernetes-workshop:1.1.0 --record

# Warte bis neue Version der Anwendung deployed wurde
$ rk rollout status deployment kitty

# Testen ob Anwendung funktioniert:
$ rk port-forward service/kitty 8080:80
```

