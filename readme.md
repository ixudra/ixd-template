## Ixudra Project Template

This is a project template for any future Laravel project that will be developed by Ixudra, a Belgian web development company owned by Jan Oris.


## New project setup

There are several actions that need to be to be executed before development of a new application can start:

 - Generate a private key
 - Add url and custom packages to app/config/app.php (if necessary)
 - Modify and replace YourAppName in the environment names in app/bootstrap/start.php
 - Modify and replace YourAppName in the database setup in app/config/local/database.php
 - Modify and replace YourAppName in the database setup in app/config/testing/database.php
 - Modify and replace YourAppName in the database setup in app/config/production/database.php
 - Modify and replace YourAppName in the PHPUnit setup in app/phpunit.xml
 - Modify and replace YourAppName and Jenkins path in the PHPdox input in app/build/input/phpdox-ixudra.xml
 - Run composer update --no-script
 - Run composer update
 - Add new virtual host to apache hosts file + restart apache server
 - Add redirect to Windows hosts file (if necessary)


