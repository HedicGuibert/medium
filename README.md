# Medium

## Présentation du projet

Medium est une application web qui a été créée en 4 jours par 4 étudiants dans le cadre d'un examen. Le but du projet est de réussir à créer une application fonctionnelle avec des **tests** sur la majeur partie des fonctionnalités et **disponible en production** dans le délai imparti.

## Installation

Une fois le projet téléchargé faire `composer install`

Créez une base de données et ajoutez la dans votre .env ensuite utilisez la commande : `php artisan migrate --seed`

Executez ensuite la commande `php artisan storage:link`

Enfin vous pouvez lancer le serveur avec la commande `php artisan serve`

## Présentation des fonctionnalités

### Espace utilisateur

 - Création de compte
 - Edition du compte

### Rôles

Il existe 4 rôles utilisateurs qui restreignent l'accès aux différentes parties du site :
 - user
 - author
 - editor
 - admin
 
Chaque rôle possède les autorisations des rôles précédents en plus de celles qui lui sont propres. Ainsi, un admin a accès à toutes les fonctionnalités du site.

### Commentaires

Les utilisateurs peuvent :
 - commenter les articles
 - liker les commentaires
 - répondre aux commentaires

### Rédaction d'articles

Les auteurs peuvent :
 - écrire, modifier et publier un article
 - faire une demande pour rejoindre un groupe d'article
