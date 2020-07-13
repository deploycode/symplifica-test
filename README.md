Symplifica-test
===============

Symfony Project v 5.1 & Bootstrap 4

Installation
------------

Clonar el proyecto :

	https://github.com/deploycode/symplifica-test

Instalar :

	composer install

Crear base de datos :

    php bin/console doctrine:database:create

Create schemas :

	php bin/console doctrine:schema:create


Consideraciones
---------------------
+ El empleador es asignado durante la creación del empleado 
+ El sistema reporta únicamente empleadores con empleados (No empleadores sin empleados)
+ Se puede agregar un empleado a otro empleado permitiendo tener más de un nivel de jerarquía


Sobre mí
-------
Otros desarrollos

    http://glaucoma.org.co/ (Symfony)
    http://ambliopia.com.co/ (Laravel)
    http://www.altavision.co/ (Laravel)
    http://www.oftalmologo.com.co/ (Lumen)
    http://examenesdiagnosticos.com.co/ (Laravel)
    http://www.hablemosdesalud.com.co/ (Symfony)
