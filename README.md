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
  <a href="#memo-license">License</a> &#xa0;
</p>

<br>

## :dart: About

- PHP Version : `8.2`
- Dependencies used :
  - [DomPdf](https://dompdf.github.io/)
  - [Toastr](https://codeseven.github.io/toastr/)
  - [Select2](https://select2.org/)
- Depends on a Database
- Every adding and edit of the shopping cart is done with fetch
- The project architecture is in MVC

## :sparkles: Features

### User Side :

:heavy_check_mark: Log in / Create an account\
:heavy_check_mark: Edit your profile / Log out\
:heavy_check_mark: Add a product or a menu to the shopping cart\
:heavy_check_mark: Look, Edit, Validate (with or without delivery) your shopping cart\
:heavy_check_mark: Consult your orders et download if needed every order in PDF\
:heavy_check_mark: Send a message to the administrators

### Administrators Side :

:heavy_check_mark: Consult every order of all the users and download if needed every order in PDF\
:heavy_check_mark: Consult your sales revenues and your flagship products or menus during the last 7 days\
:heavy_check_mark: Add / Edit / Delete products, menus, foods and categories\
:heavy_check_mark: Create / Edit / Delete coupons

## :rocket: Technologies

The following technologies were used for this project :

- [PHP](https://www.php.net/)
- [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
- [MySQL](https://dev.mysql.com/doc/refman/5.7/en/data-types.html)

## :white_check_mark: Requirements

Before starting :checkered_flag:, you need `composer` and `git` installed.

## :arrow_down: Importation

### Import the Database

1. In PHPMyAdmin create a database called `croc_express`
2. Collect the database with the example datas in the folder `database/models/`
3. Drag and drop the file `croc_express.sql` in the database `croc_express` on PHPMyAdmin

## :lock_with_ink_pen: Configuration

### Configure the config file

1. Edit config.example.php with the Database's name (DATABASE) and the Project's name (PROJECT_NAME)
2. Rename config.example.php to config.php

## :checkered_flag: Starting

```bash
# Clone the project
$ git clone https://github.com/Raxuis/Croc-Express.git

# Go to the project's root folder
$ cd Croc-Express

# Install the dependencies
$ composer install

# Use MAMP/XAMP/LAMP or WAMP and start the server

# The server will initialize at the URL <http://localhost:8888/>

# Then, go to the URL <http://localhost:8888/Croc-Express/public/>

# Everything should work perfectly fine 😃
```

⚠️ To be sure that everything works you can wipe the session of `localhost` thanks to the path `?page=killall`.

## Connection datas

Different datas are included in the database to be able to try the website. Orders were also placed using the administrator's account.

### Administrator account

- Email : `admin@admin.fr`
- Password : `password`

### User account

- Email : `user@user.fr`
- Password : `password`

## :memo: License

This project is under MIT license. For more details, check the [LICENSE](LICENSE.md).

Made with ❤️ by <a href="https://github.com/Raxuis" target="_blank">Raphaël</a> and <a href="https://github.com/BenoitPrmt" target="_blank">Benoît</a>

&#xa0;

<a href="#top">Go back to top</a>
