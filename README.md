TestMW
======

Description
-----------

Cette plateforme à été crée dans le cadre d'un test technique visant à créer une plateforme permettant:

- De changer de langue (en, fr)
- D’ajouter un nouveau client à l’aide d’un formulaire demandant de préciser les informations suivantes :
    - Nom de l’entreprise (champ obligatoire)
    - Nom du contact (champ obligatoire)
    - Email de contact (champ facultatif)
    - Numéro de téléphone de contact (champ facultatif)
- D’ajouter un nouveau site internet à l’aide d’un formulaire demandant de préciser les informations suivantes :
    - Nom du site internet (champ obligatoire)
    - Lien du site internet (champ obligatoire)
    - Description du site internet (champ facultatif, texte enrichi (Tinymce))
    - Client concerné (liste déroulante qui vient chercher les clients enregistrés sur la plateforme) (champ obligatoire)
    - Version de PHP (liste déroulante, valeur possible : 7.0, 7.1, 7.2, 7.3, 7.4), les versions n'ont pas vocations à être administrable dans la plateforme (champ facultatif)
- De lister les sites internet sur la page d’accueil du site internet (par date d’ajout décroissant)
    - D'afficher pour chaque site les différentes informations renseignées lors de l’ajout du site avec une pagination de 15 sites par page.

La totalité de la plateforme n'est accessible qu'aux administrateurs.

Technologies utilisées
----------------------

Symfony v5.1.8
PHP v7.4.1
EasyAdmin v3

Installation
------------

Prerequis: Installer le binaire symfony sur disponible sur [cette page](https://symfony.com/download) pour
pouvoir executer les commandes ci-après.

```
$ git clone https://github.com/katchalamele/testMW.git
$ cd testMW
$ composer install
```

Attendre la fin de l'installation de toutes les dépendences,
puis executer ces commandes dans la racine du projet:

```
rm  vendor/easycorp/easyadmin-bundle/src/Resources/views/layout.html.twig
mv templates/layout.html.twig vendor/easycorp/easyadmin-bundle/src/Resources/views/layout.html.twig
```

Puis executer en fonction de l'environement:

```
linux/macOS:$ touch vendor/easycorp/easyadmin-bundle/src/Resources/views/layout.html.twig
windows:  PS> (gci vendor/easycorp/easyadmin-bundle/src/Resources/views/layout.html.twig).LastWriteTime = Get-Date
```

et enfin pour lancer le projet:

```
$ symfony server:start
```
la plateforme sera alors disponible sur  http://127.0.0.1:8000.

Authentification
----------------

Pour se connecter en tant qu'administrateur essayez *admin:admin* :wink:.
Pour tester avec un simple utilisateur essayez: *toto:toto*.

Sinon pour créer un utlisisateur vous devez l'ajouter manuellement dans
la base de donnée sqlite située dans `var/testMW.db`.

Pour le hashage du mot de passe utiliser:

```
symfony console security:encode-password
```

et ne pas oublier d'ajouter le `"ROLE ADMIN"` dans la liste de roles
car **la plateforme n'est accessible qu'aux administrateurs**.

Configuration BDD
-----------------

Pour lancer le projet, pas besoin de configurer la base de donnée.
Une base de donnée sqlite existe déja dans le projet dans `var/testMW.db` et c'est celle qui est utilisée par défaut.
Le `.gitignore` à été modifié pour ne pas l'ignorer.

Cependant, si vous voulez utiliser votre propre base de donnée il faudra
modifier le fichier .env puis executer les commandes suivantes:

```
$ symfony console make:migration
$ symfony console doctrine:migrations:migrate
```

Et enfin, créer manuellement de nouveaux utilisateurs dans la nouvelle base de données.