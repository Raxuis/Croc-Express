<div align="center" id="top"> 
  <img src = 'https://i.ibb.co/QPFk1cq/Croc-Express.png' alt="Croc Express" />
</div>

<h1 align="center">🍕 Croc Express 🍔</h1>

<p align="center">
  <img alt="Github top language" src="https://img.shields.io/github/languages/top/Raxuis/croc-express?color=56BEB8">

  <img alt="Github language count" src="https://img.shields.io/github/languages/count/Raxuis/croc-express?color=56BEB8">

  <img alt="Repository size" src="https://img.shields.io/github/repo-size/Raxuis/croc-express?color=56BEB8">

  <img alt="License" src="https://img.shields.io/github/license/Raxuis/croc-express?color=56BEB8">
</p>
<p align="center">
  <a href="#dart-about">About</a> &#xa0; | &#xa0; 
  <a href="#sparkles-features">Features</a> &#xa0; | &#xa0;
  <a href="#rocket-technologies">Technologies</a> &#xa0; | &#xa0;
  <a href="#white_check_mark-requirements">Requirements</a> &#xa0; | &#xa0;
  <a href="#arrow_down-importation">Importation</a> &#xa0; | &#xa0;
  <a href="#checkered_flag-starting">Starting</a> &#xa0; | &#xa0;
  <a href="#memo-license">License</a> &#xa0; | &#xa0;
</p>

<br>

## :dart: About

- Version de PHP : `8.2`
- Dépendances utilisées
  - [DomPdf](https://dompdf.github.io/)
  - [Toastr](https://codeseven.github.io/toastr/)
  - [Select2](https://select2.org/)
- Dépend d'une base de données
- Tout ajout au panier et modification est fait avec fetch
- L'architecture du projet est en MVC

## :sparkles: Features

### Partie Utilisateur :

:heavy_check_mark: Se connecter / Créer un compte\
:heavy_check_mark: Modifier son profil / Se déconnecter\
:heavy_check_mark: Ajouter un produit ou un menu au panier\
:heavy_check_mark: Regarder, Modifier, Valider (avec ou sans livraison) notre panier\
:heavy_check_mark: Consulter ses commandes et télécharger si nécessaire chaque commande en PDF\
:heavy_check_mark: Envoyer un message à l'administrateur

### Partie Administrateur :

:heavy_check_mark: Consulter toutes les commandes de tous les utilisateurs et télécharger si nécessaire chaque commande en PDF\
:heavy_check_mark: Consulter son chiffres d'affaires et ses produits ou menu phares des 7 derniers jours\
:heavy_check_mark: Ajouter / Modifier / Supprimer des produits, menus, aliments et catégories\
:heavy_check_mark: Créer / Modifier / Supprimer un bon d'achat

## :rocket: Technologies

Les technologies suivantes ont été utilisées pour ce projet :

- [PHP](https://www.php.net/)
- [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

## :white_check_mark: Requirements

Avant de commencer :checkered_flag:, vous avez besoin d'avoir [Git](https://git-scm.com) installé.

## :arrow_down: Importation

### Importer la base de données

1. Dans PHPMyAdmin créer une base de données `croc_express`
2. Récupérer la base de données avec les données d'exemple dans le dossier `database/models/`
3. Drag and drop le fichier `croc_express.sql` dans la base de données `croc_express` sur PHPMyAdmin

## :checkered_flag: Starting

```bash
# Cloner le projet
$ git clone https://github.com/Raxuis/croc-express

# Y accéder
$ cd croc-express

# Installer les dépendances
$ composer install

# Utiliser MAMP/XAMP/LAMP ou WAMP et lancer le serveur

# Le server va s'initializer à l'URL <http://localhost:8888/>

# Accéder ensuite à l'URL <http://localhost:8888/Croc-Express/public/>

# Tout devrait fonctionner 😃
```

## :memo: License

Ce projet est sous license MIT. Pour plus de détails, consultez le fichier [LICENSE](LICENSE.md).

Créé de tout :heart: par <a href="https://github.com/Raxuis" target="_blank">Raphaël</a> et <a href="https://github.com/BenoitPrmt" target="_blank">Benoît</a>

&#xa0;

<a href="#top">Revenir tout en haut</a>
