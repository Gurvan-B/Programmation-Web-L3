# Programmation-Web-L3
Projet Programmation de clients Web L3 Miage

Pour installer le projet, il suffit de 
- le placer à la racine du site web
- de créer une nouvelle base de données dans laquelle il faudra importer la base de données inventory grâce au fichier .sql fourni.
- Modifier le fichier functions/db.php en fonction du nom, mot de passe, etc de votre SGBD.

Vous pouvez voir une version déployée du projet à l'adresse suivante: https://pw-projetgb.planethoster.world

Ecrans:

- Un exemple de la page d'un deck

  ![Capture d'écran 2023-10-27 154858](https://github.com/Gurvan-B/Programmation-Web-L3/assets/74820699/ae40dec5-2351-4293-a827-a512caf91526)


- Page profil utilisateur

![Capture d'écran 2023-10-27 155006](https://github.com/Gurvan-B/Programmation-Web-L3/assets/74820699/06f96a88-7abe-4689-bc2f-ee3d2ee22a99)


Voici les principales choses qu'il est possible de faire sur le site web:

- Créer un compte, se connecter
- Accéder à son profil, changer sa photo, son mot de passe, supprimer son compte et importer une photo depuis ces fichiers.

- Accéder à ses listes, créer des nouvelles listes, choisir la couleur
- Utiliser la barre de recherche pour chercher par auteur ou par nom, une liste, il est possible de ne pas écrire le nom en entier

- Dans sa liste, il est possible d'ajouter des cartes, de choisir leurs attributs
- Une fois une carte ajoutée, si l'on clique sur son nom, le site redirige vers un autre site en fonction du nom de la carte
- Seuls les propriétaires peuvent ajouter ou supprimer des cartes, bien que le bouton s'affiche pour tout le monde
- Après une mise à jour d'une liste, la date de maj de celle-ci se met à jour, et la liste remonte en haut dans les listes de l'accueil. 
- Le lien est ensuite partageable à d'autres personnes.

- Chaque liste à sa section commentaires, dans laquelle tous les utilisateurs connectés peuvent écrire un court texte.

- Dans le panneau supérieur, il y a un lien vers test, je l'ai relié à une page qui m'a servit à tester du Ajax

- Si l'on se trompe d'adresse sur le site, nous sommes automatiquement redirigés vers une page 404
- Les extensions des fichiers .php ne sont pas affichées dans l'url
