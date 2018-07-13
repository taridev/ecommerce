# eCommerce

## Installation:
* Si vous avez déjà créé la base, veillez à ce que le champs **d**escription de la table article soit écrit en minuscule
sans quoi ça ne fonctionnera pas.
* Sinon lancez les scripts sql _article.sql_ et _user.sql_
* modifiez les paramètres d'accès à la base dans le fichier _/config/config.php_.
* La fonctionnalité de création d'utilisateur n'est pas implémenter. Pour vous authentifier vous devez créer un utilisateur
directement en base et stocker son mot de passe en sha1.

## Structure:
* Le point d'accès au site se fait sur le fichier _/public/index.php_. C'est ce fichier qui sert de routeur.

## Dépendances:
* Pour l'impression de la facture en PDF : pdflib-lite 


