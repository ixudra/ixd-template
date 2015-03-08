Ixudra project template
============================================
                                            
This is a project template for any future Laravel project that will be developed by Ixudra, a Belgian PHP development company owned by Jan Oris. It is modified to use Laravel 5.

This package can be used by anyone at any given time, but keep in mind that it is optimized for my personal custom workflow. It may not suit your project perfectly and modifications may be in order.


## New project setup
 
Clone this repository to a local folder. If everything is up and running, go through these steps to complete to setup:

- Install packages via Composer: `composer install`
- Add your machine hostname to the environment names in `bootstrap/start.php`
- Create migrations table: `php artisan migrate:install`
- Run migrations and seeders: `php artisan migrate:refresh --seed`

There are several actions that need to be to be executed before development of a new application can start:

 - Download the template into a new directory: `git clone git@github.com:ixudra/ixd-template.git YourAppName`
 - Remove the existing git repository: `rm -rf YourAppName/.git`
 - Initialize a new git repository inside the YourAppName directory: `git init`
 - Add your name and email to the .git config: `vim .git/config`
 - Add a new remote for your repository: `git remote add origin https://urlToYourAppRepository`
 - Add, commit and push your files to the repository
 - Add url and custom packages to `Config/app.php` (if necessary)
 - Add url and custom packages to `Config/local/app.php` (if necessary)
 - Change the name of `.env.example` to `.env`: `mv .env.example .env`
 - Modify and replace temporary values in `.env`
 - Modify and replace temporary values in `.env.testing`
 - Change the name of `readme.example` to `readme.md`: `rm readme.md` - `mv readme.example readme.md`
 - Modify and replace temporary values in `readme.md`
 - Modify and replace YourAppName in `App/Services/validators/AppValidator.php`
 - Modify and replace YourAppName in `App/Services/validators/AppValidatorTrait.php`
 - Run `composer update --no-scripts`
 - Run `composer update`
 - Run `php artisan key:generate` to generate a private key
 - Enter your secret key in the application setup in `Config/app.php`
 - Enter your secret key in the application setup in `Config/local/app.php`
 - Add new virtual host to apache hosts file + restart apache server
 - Add redirect to your hosts file


## CodeCeption setup

 - Run composer update (if you haven't done so already)
 - Modify and replace YourAppName in the database configuration in `codeception.yml`
 - Modify and replace YourAppName in the application url in `app/tests/acceptance.suite.yml`
 - Modify and replace YourAppName in the application url in `app/tests/api.suite.yml`
 - Create a database dump of your test database (empty tables and/or static data) and move it to `app/tests/_data/dump.sql`
 - Run `vendor/bin/codecept` build command to build test guys for testing purposes (should be repeated every time you change modules for a suite)
 - Run `vendor/bin/codecept run` to run all test suites
 - Run `vendor/bin/codecept run --coverage-html` to run all test suites with HTML code coverage


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)



## Contact

Jan Oris (developer)

- Email: jan.oris@ixudra.be
- Telephone: +32 496 94 20 57

