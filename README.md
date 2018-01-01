# pdfbooks.nl

# Setup

There is no setup required just place the folder pdfbooks on your server and go to [localhost/pdfbooks](localhost/pdfbooks).

The files used in the demo are in /app/views/demo/...


## Project structure
<!-- You can not trust tabs here for a correct result so we use spaces instead -->
<pre>
- app/                  -- All our MVC stuff goes in here
    - model/              -- Our MVC Model
    - view/               -- Our MVC Views 
    - contollers/         -- Our MVC Controllers 

- config/               -- All configuration files
    app.php               -- This links the public/index.php to the framework
    config.php            -- General personal configuration for your installation
    routes.php            -- This file links a url to a function in a controller
    seeds.php             -- This file contains everything to rebuild the database

- core/                 -- Our most important framework files
    - Autoload/           -- Autoload Class
    - database/           -- Database Class
    - router/             -- View / ViewLoader Class
    helpers.php         -- All helper functions are in here

- noframework/          -- A collection of files that are used in the generators

- public/               -- The root of our application
    - assets/             -- Contains all assets for the web-application
    index.php             -- Root file

index.html              -- Welcome message
noframework.php         -- $ php ./noframework.php  for more info about this tool
</pre>


