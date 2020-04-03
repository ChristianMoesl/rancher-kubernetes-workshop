## Basic-Authentication aktivieren
```
# Erstelle ein Secret mit dem Namen "credentials" mit dem KV-Paar "password: 123"
$ rk create secret generic credentials --from-literal=password=123

# In deployment.yaml wurde die Environment Variable PASSWORD definiert und die Image Version erhöht. Deshalb muss das deployment überschrieben werden.
$ rk replace -f deployment.yaml
```
