Simple Exemple Symfony 4 CRUD
===

we will learn how to create a simple project symfony4

Install Project Symfony4
---

To create your new Symfony application, first make sure you're using PHP 7.1 or higher and have [Composer](https://getcomposer.org/) installed. If you don't, start by [installing Composer globally](https://symfony.com/doc/current/setup/composer.html) on your system.


Create your new project by running:

composer create-project symfony/website-skeleton my-project


Use Cmd for easy developement
---


for installing a component with composer:

Exemple: orm doctrine 
cmd: composer require orm

for start project symfony4 with cmd: php bin/console server:run
for make new entity with cmd: php bin/console make:entity nameEntity
for make new controller with cmd: php bin/console make:controller
for make new form with cmd: php bin/console make:form


Use Cmd for migration database
---
Php bin/console make:migration
Php bin/console doctrine:migrations:migrate  



Relation in database
---
ManyToOne
OneToMany
