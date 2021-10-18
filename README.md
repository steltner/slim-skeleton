# Slim Framework 4 Skeleton Application

Use this skeleton application to quickly setup and start working on a new Slim Framework 4 application. This application uses the latest Slim 4 with Slim PSR-7 implementation and PHP-DI container implementation. Also FluentPDO as sql query builder and Monolog as logger.

This skeleton application was built for Composer. This makes setting up a new Slim Framework application quick and easy.

## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application. You will require PHP 8.0 or newer.

    composer create-project slim/slim-skeleton [my-app-name]

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writable.

To run the application in development, you can run these commands 

    composer start

Or you can use `docker-compose` to run the app with `docker`, so you can run these commands:

    docker-compose up -d

After that, open `http://localhost:8080` in your browser.

Run this command in the application directory to run the test suite

    composer test

Run codesniffer

    composer cs

That's it! Now go build something cool.
