Simple Exemple Symfony 4 CRUD
===
create a simple project symfony4 with action :
<ul>

<li>Add and Update and Delete in database with component ORM Doctrine</li>
<li>Upload picture </li>
<li>Relation Doctrine between entity: ManyToOne</li>
<li>Use DataFixtures</li>
</ul>


Manage Notice:
---
<ul>

<li>Add and Update and Delete Category of Notice</li>
<li>Add and Update and Delete Person will making notice</li>
<li>Add and Update and Delete Notice</li>
</ul>


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
<ul>
<li>for start project symfony4 with cmd: php bin/console server:run</li>
<li>for make new entity with cmd: php bin/console make:entity nameEntity</li>
<li>for make new controller with cmd: php bin/console make:controller</li>
<li>for make new form with cmd: php bin/console make:form</li>
</ul>

Create database
---
php bin/console doctrine:database:create

Create shema to database
---
<p>php bin/console doctrine:schema:update --dump-sql</p>
<p>php bin/console doctrine:schema:update --force</p>



Use Cmd for migration database
---
<p>Php bin/console make:migration</p>
<p>Php bin/console doctrine:migrations:migrate  </p>



Relation in database
---
<p>ManyToOne</p>
<p>OneToMany</p>
