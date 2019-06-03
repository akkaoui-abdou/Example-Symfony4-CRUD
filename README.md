Simple Exemple Symfony 4 CRUD
===
create a simple project symfony4 with action :

<p>Add and Update and Delete in database with component ORM Doctrine</p>
<p>Upload picture </p>
<p>Relation Doctrine between entity: ManyToOne</p>
<p>Use DataFixtures</p>


Manage Notice:
---
<p>Add and Update and Delete Category of Notice</p>
<p>Add and Update and Delete Person will making notice</p>
<p>Add and Update and Delete Notice</p>


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

<p>for start project symfony4 with cmd: php bin/console server:run</p>
<p>for make new entity with cmd: php bin/console make:entity nameEntity</p>
<p>for make new controller with cmd: php bin/console make:controller</p>
<p>for make new form with cmd: php bin/console make:form</p>


Use Cmd for migration database
---
<p>Php bin/console make:migration</p>
<p>Php bin/console doctrine:migrations:migrate  </p>



Relation in database
---
<p>ManyToOne</p>
<p>OneToMany</p>
