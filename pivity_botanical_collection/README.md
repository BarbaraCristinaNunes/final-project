# Privit Botanical Collection - PBC

## Project Structure

### [scr/ConstantsData/Constants.php](https://github.com/BarbaraCristinaNunes/final-project/blob/main/pivity_botanical_collection/src/ConstantsData/Constants.php)

I created six (6) arrays where I keep information about phylum, class, order, family, genus and scientific name. Information from array called $genus are from [GBIF](https://www.gbif.org/species/2519) and [The Plant List](http://www.theplantlist.org/browse/A/Cactaceae/) and information from array called $scientificName are from [GBIF](https://www.gbif.org/species/2519).

## <b>Notes</b>

* 21/01/2022

When I created Constants.php it was not a class. So I was having problem to run the project and to install Doctrine.

    Symfony was returning the following error:
    Symfony\Component\ErrorHandler\DebugClassLoader::checkClass(): Argument #1 ($class) must be of type string, array given, called in C:\******\******\*****\******\******\final-project\pivity_botanical_collection\vendor\symfony\error-handler\DebugClassLoader.php on line 298

To resolve this I trasnformed Constants.php in a class and my arrays in public variables.

-------------
## To run this project 

### Installing Doctrine

        composer require symfony/orm-pack
        composer require --dev symfony/maker-bundle

[Reference](https://symfony.com/doc/current/doctrine.html)

### Configuring the Database

The database connection information is stored as an environment variable called DATABASE_URL. For development, you can find and customize this inside .env:

    # .env (or override DATABASE_URL in .env.local to avoid committing your changes)

    # customize this line!
    DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=VERSION"

    # to use mariadb:
    DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=mariadb-VERSION"

    # to use sqlite:
    # DATABASE_URL="sqlite:///%kernel.project_dir%/var/app.db"

    # to use postgresql:
    # DATABASE_URL="postgresql://db_user:db_password@127.0.0.1:5432/db_name?serverVersion=11&charset=utf8"

    # to use oracle:
    # DATABASE_URL="oci8://db_user:db_password@127.0.0.1:1521/db_name"

[Reference](https://symfony.com/doc/current/doctrine.html)
### Start Database

Create a schema

        php bin/console doctrine:database:create

Create an object and new table

        php bin/console make:entity

Then

        php bin/console make:migration

Then 

        php bin/console doctrine:migrations:migrate

[Reference](https://symfony.com/doc/current/doctrine.html)

<b>Notes</b>

* 21/01/2022

You can find database structure [here](https://github.com/BarbaraCristinaNunes/final-project).

In columns order_plant from table species I tried to user the word <b>order</b>, but I had the following error:

        [ERROR] Name "order" is a reserved word


* 31/01/2022

I changed my database structure and created an institution table. Now samples are associated with institutions and not with users.

--------------
## Constrollers

Run the following code to create controllers:

        php bin/console make:controller
### 1- Registration

* 31/01/2022

Created a simple form.

* 01/02/2022

I can create a new institution using method called institutionRegistration() and a new user using method called userAdmRegistration().

<b>NOTE: </b>I am think in refactor institutionRegistration() and create a validation() method

Form validation is not done yet.

------------------
### 2 - Login

* 01/02/2022

I created a form and thought how I will do the querry in UserRepository.php

-------------

### 2 - Homepage

* 01/02/2002

I started to thing how and what I have to show to the user after login.