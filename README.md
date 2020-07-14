Symplifica-test
===============

Symfony Project v 5.1 & Bootstrap 4 (Requiere php 7.4 o superior)

Installation
------------

Clonar el proyecto :

	git clone https://github.com/deploycode/symplifica-test
	
	cd symplifica-test

	composer install


Configurar url de conexión a base de datos el archivo .env

    // Por ejemplo éste comando creará la base de datos symplifica-test
    // con usuario root, sin contraseña, en el host 127.0.0.1 y puerto: 3306
    
    DATABASE_URL=mysql://root:@127.0.0.1:3306/symplifica-test?serverVersion=5.7

Crear base de datos :

    php bin/console doctrine:database:create

Crear schemas :

	php bin/console doctrine:schema:create

Arrancar servidor
    
    // Iniciará la aplicación en la dirección localhost:8000
    php -S localhost:8000 -t public/
    
Consideraciones
---------------------
+ El empleador es asignado durante la creación del empleado (Al no ser específicado en la tarea)
+ El sistema reporta únicamente empleadores con empleados (No empleadores sin empleados basado en la referencia)
+ Se puede agregar un empleado a otro empleado permitiendo tener más de un nivel de jerarquía
+ En el directorio `__DATABASE__` se encuentra un script SQL con registros de prueba

Sobre mí
-------
Otros desarrollos

    http://glaucoma.org.co/ (Symfony)
    http://ambliopia.com.co/ (Laravel)
    http://www.altavision.co/ (Laravel)
    http://www.oftalmologo.com.co/ (Lumen)
    http://examenesdiagnosticos.com.co/ (Laravel)
    http://www.hablemosdesalud.com.co/ (Symfony)
