# transfert_api

docker compose up -d

docker exec www_transfert_api composer create-project symfony/skeleton:"6.4.*"

pour acceder au container depuis un host windows, executer la commande suivante:

winpty docker exec -it www_transfert_api //bin/bash