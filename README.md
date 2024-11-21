# todolist-app-docker

un projet simple en PHP avec MySQL, orchestré avec Docker. Ce projet est une petite application de gestion de tâches (to-do list).
Ce projet vous permet de pratiquer Docker tout en créant une application simple en PHP et MySQL.

# Fonctionnalités du projet 

-Ajouter des tâches. Marquer les tâches comme terminées. 
-Supprimer des tâches. 
-Liste des tâches affichée depuis une base de données MySQL

# Structure du projet

/todolist-app-docker
|-- docker-compose.yml
|-- php/
|   |-- Dockerfile
|   |-- src/
|       |-- index.php
|       |-- db.php
|-- mysql/
    |-- init.sql

# Lancer le projet

1. Démarrez Docker dans le répertoire avec :
    docker-compose up --build
2. Accédez à l'application dans votre navigateur à l'adresse http://localhost:8080


