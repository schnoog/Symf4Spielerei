## MySymfony

My first experiments with Symfony 4.
...became a kind of boilerplate

This contains:

- FOSUserBundle

- EasyAdmin

- KNP-Menu-Bundle (bootstrap 4 menu)

- BootStrap 4 Templates for FOSUserBundle

- Bootstrap4, JQuery, Propper, Fontsawesome local (now npm or bower required)


Tbh. most copy/paste

## Installation



**Composer is required**



### Clone the Git repo or ### [downlod it](http://https://github.com/schnoog/Symf4Spielerei/archive/master.zip) 

https://github.com/schnoog/Symf4Spielerei.git

`git clone https://github.com/schnoog/Symf4Spielerei.git **TargetDir**`



#### Change into the TargetDir and install the components ####

`composer install`


#### Fix KNP-Menu-Bundle  - current release is buggy with SF4.2 ####
[Find more about the problem here](https://github.com/KnpLabs/KnpMenuBundle/pull/396)

`git checkout vendor/knplabs/knp-menu-bundle/src/DependencyInjection/Configuration.php`

This changes the lines 
`$treeBuilder = new TreeBuilder();`
`$rootNode = $treeBuilder->root('knp_menu');`
To
`$treeBuilder = new TreeBuilder('knp_menu');`
`$rootNode = $treeBuilder->root('knp_menu');`
`if (method_exists($treeBuilder, 'getRootNode')) {`
`    $rootNode = $treeBuilder->getRootNode();`
`} else {`
`     // BC layer for symfony/config 4.1 and older`
`    $rootNode = $treeBuilder->root('knp_menu');`
`}`

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

