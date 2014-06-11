## Ixudra Project Template

This is a project template for any future Laravel project that will be developed by Ixudra, a Belgian PHP development company owned by Jan Oris. It is modified to use Laravel 4.1.

This package can be used by anyone at any given time, but keep in mind that it is optimized for my personal custom workflow. It may not suit your project perfectly and modifications may be in order.


## New project setup

There are several actions that need to be to be executed before development of a new application can start:

 - Download the template into a new directory: git clone git@github.com:ixudra/ixd-template.git YourAppName
 - Remove the existing git repository: rm -rf YourAppName/.git
 - Initialize a new git repository inside the YourAppName directory: git init
 - Add your name and email to the .git config: vim .git/config
 - Add a new remote for your repository: git remote add origin https://urlToYourApp
 - Add, commit and push your files to the repository
 - Add url and custom packages to app/config/app.php (if necessary)
 - Modify and replace YourAppName in the environment names in app/bootstrap/start.php
 - Modify and replace YourAppName in the database setup in app/config/local/database.php
 - Modify and replace YourAppName in the database setup in app/config/testing/database.php
 - Modify and replace YourAppName in the database setup in app/config/production/database.php
 - Modify and replace YourAppName in the PHPUnit setup in app/phpunit.xml
 - Modify and replace YourAppName and Jenkins path in the PHPdox input in app/build/input/phpdox-ixudra.xml
 - Run composer update --no-scripts
 - Run composer update
 - Generate a private key
 - Enter your secret key in the application setup in app/config/local/app.php
 - Enter your secret key in the application setup in app/config/testing/app.php
 - Enter your secret key in the application setup in app/config/production/app.php
 - Add new virtual host to apache hosts file + restart apache server
 - Add redirect to your hosts file


## CodeCeption setup

 - Run composer update (if you haven't done so already
 - Modify and replace YourAppName in the database configuration in codeception.yml
 - Modify and replace YourAppName in the application url in app/tests/acceptance.suite.yml
 - Create a database dump of your test database (empty tables and/or static data) and move it to app/tests/_data/dump.sql
 - Run vendor/bin/codecept build command to build test guys for testing purposes (should be repeated every time you change modules for a suite)
 - Run vendor/bin/codecept run to run all test suites
 - Run vendor/bin/codecept run --coverage-html to run all test suites with HTML code coverage


