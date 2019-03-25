## MySymfony

My first experiments with Symfony 4.
...became a kind of boilerplate

This contains:

- FOSUserBundle

- EasyAdmin

- KNP-Menu-Bundle (bootstrap 4 menu)

- BootStrap 4 Templates for FOSUserBundle

- Bootstrap4, JQuery, Propper, Fontsawesome local (now npm or bower required)


Tbh. most is copy/paste
But at least this project shows how to implement the bundles without the need to search for hours for solutions (like said before, I'm new to Symfony)
# Installation
**Composer is required**
## Get the files
### Old fashioned way - Clone the Git repo or  [downlod it](http://https://github.com/schnoog/Symf4Spielerei/archive/master.zip) 
https://github.com/schnoog/Symf4Spielerei.git
`git clone https://github.com/schnoog/Symf4Spielerei.git **TargetDir**`
Change into the TargetDir and install the components
`composer install`
### The composer way
`composer create-project schnoog/symf4spielerei <TargetDirectory>`
### Remark
The composer install script will replace a file in the Knp-Menu-Bundle every time 
`composer install` oder `composer update` are called.
> vendor/knplabs/knp-menu-bundle/src/DependencyInjection/Configuration.php

[Find more about the problem here](https://github.com/KnpLabs/KnpMenuBundle/pull/396)


## Finalze the installation
#### Create a database ####

#### copy the .env file ####

`cp .env .env.local`

and fill in your data (database, mailserver....)


#### Create the tables ####

`php bin/console doctrine:schema:create`


#### Create a user ####

`php bin/console fos:user:create`

#### Make the user admin ####

`php bin/console fos:user:promote`

by setting the role **ROLE_ADMIN**

## Have fun ##

