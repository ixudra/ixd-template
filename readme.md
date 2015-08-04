Ixudra project template
============================================

This is a project template for any future Laravel 5 project that will be developed by [Ixudra](http://ixudra.be), a Belgian PHP development company owned by Jan Oris. It is modified to use Laravel 5.

This template can be used by anyone at any given time, but keep in mind that it is optimized for my personal custom workflow. It may not suit your project perfectly and modifications may be in order.



## New project setup
 
There are several actions that need to be to be executed before development of a new application can start:

 - Download the template into a new directory: `git clone git@github.com:ixudra/ixd-template.git yourAppName`
 - Remove the existing git repository: `rm -rf yourAppName/.git`
 - Initialize a new git repository inside the YourAppName directory: `git init`
 - Add your name and email to the .git config: `vim .git/config`
 - Add a new remote for your repository: `git remote add origin https://urlToYourAppRepository`
 - Add, commit and push your files to the repository
 - Add url and custom packages to `Config/app.php`
 - Change the name of `.env.example` to `.env`: `mv .env.example .env`
 - Modify and replace temporary values in `.env.testing`
 - Run `composer update`
 - Run `php artisan key:generate` to generate a private key
 - Enter your secret key in the application in `.env`
 - Enter your secret key in the application in `.env.testing`
 - Replace YourAppName in `resources/views/bootstrap/layouts/master.blade.php`
 - Replace YourAppName in `resources/views/bootstrap/layouts/menu-top.blade.php`
 - Replace YourAppName in `app/Services/Mail/MailService.php`
 - Add new virtual host to apache hosts file + restart apache server
 - Add redirect to your hosts file
 - Change the name of `readme.example` to `readme.md`: `rm -rf readme.md && mv readme.example readme.md`
 - Modify and replace temporary values in `readme.md`
 - Modify and replace temporary values in `composer.json`



## CodeCeption setup

 - Run composer update (if you haven't done so already)
 - Create a test database with the name `ixd_yourAppName_test`
 - Create a database user the following credentials: `yan_user_test` - `yan_pwd_test` and make sure this user has access to the test database
 - Modify and replace YourAppName in the database configuration in `codeception.yml`
 - Modify and replace YourAppName in the application url in `tests/acceptance.suite.yml`
 - Modify and replace YourAppName in the application url in `tests/api.suite.yml`
 - Modify and replace yourAppName in the base url in `tests/unit/base/BaseUnitTestCase.php`
 - Create a database dump of your test database (empty tables and/or static data) and move it to `tests/_data/dump.sql`: `mysqldump -u root -proot --no-data ixd_yourAppName > tests/_data/dump.sql`
 - Create a database dump of your API test database (empty tables and/or static data) and move it to `tests/_data/acceptance-dump.sql`: `mysqldump -u root -proot --no-data ixd_yourAppName > tests/_data/acceptance-dump.sql`
 - Create a database dump of your API test database (empty tables and/or static data) and move it to `tests/_data/api-dump.sql`: `mysqldump -u root -proot --no-data ixd_yourAppName > tests/_data/api-dump.sql`
 - Run `sudo vendor/bin/codecept build` to build test helpers for testing purposes (should be repeated every time you change modules for a suite)
 - Run `sudo vendor/bin/codecept run` to run all test suites
 - Run `sudo vendor/bin/codecept run --coverage-html` to run all test suites with HTML code coverage



## License

This template is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)



## Contact

Jan Oris (developer)

- Email: jan.oris@ixudra.be
- Telephone: +32 496 94 20 57

