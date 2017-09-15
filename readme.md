Ixudra project template
============================================

[![license](https://img.shields.io/github/license/ixudra/ixd-template.svg)]()

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
 - Add project name, url and custom packages to `config/app.php`
 - Change the name of `.env.example` to `.env`: `mv .env.example .env`
 - Remove the license file: `rm -rf LICENSE`
 - Modify and replace temporary values in `.env.testing`
 - Run `composer install` first to prevent errors with pre-update scripts
 - Run `composer update` to update update all packages to the latest versions
 - Run `php artisan key:generate` to generate a private key
 - Enter your secret key in the application in `.env`
 - Replace YourAppName in `resources/views/bootstrap/layouts/master.blade.php`
 - Replace YourAppName in `resources/views/bootstrap/layouts/menu-top.blade.php`
 - Replace YourAppName in `resources/views/vendor/log-viewer/_template/navigation.blade.php`
 - Replace YourAppName in `app/Services/Mail/MailService.php`
 - Add new virtual host to apache hosts file + restart apache server
 - Add redirect to your hosts file
 - Change the name of `readme.example` to `readme.md`: `rm -rf readme.md && mv readme.example readme.md`
 - Modify and replace temporary values in `readme.md`
 - Modify and replace temporary values in `composer.json`



## Elixir setup

 - Install the latest version of nodeJS if you haven't done so already (see [nodejs.org](https://nodejs.org/en/download/) for detailed instructions)
 - Install NPM globally if you haven't done so already: `sudo apt-get install npm`
 - Pull in NPM dependencies: `npm install`
 - Run Gulp to generate the CSS and Javascript files: `npm run dev`



## CodeCeption setup

 - Run composer update (if you haven't done so already)
 - Create a test database with the name `ixd_yourAppName_test`
 - Create a database user the following credentials: `yan_user_test` - `yan_pwd_test` and make sure this user has access to the test database
 - Modify and replace YourAppName in the database configuration in `codeception.yml`
 - Modify and replace yourAppName in the base url in `tests/unit/base/BaseUnitTestCase.php`
 - Update the database name and credentials in the `createDatabaseDumps.sh` script
 - Create a database dump for your database tests using the database dump script: `bash createDatabaseDumps.sh` 
 - Run `sudo vendor/bin/codecept build` to build test helpers for testing purposes (should be repeated every time you change the configuration of a suite)
 - Run `sudo vendor/bin/codecept run` to run all test suites
 - Run `sudo vendor/bin/codecept run --coverage-html` to run all test suites with HTML code coverage



## Support

Help me further develop and maintain this package by supporting me via [Patreon](https://www.patreon.com/ixudra)!!




## License

This template is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)



## Contact

For template questions, bug, suggestions and/or feature requests, please use the Github issue system and/or submit a pull request. When submitting an issue, always provide a detailed explanation of your problem, any response or feedback your get, log messages that might be relevant as well as a source code example that demonstrates the problem. If not, I will most likely not be able to help you with your problem.

For any other questions, feel free to use the credentials listed below: 

Jan Oris (developer)

- Email: jan.oris@ixudra.be
- Telephone: +32 496 94 20 57

