# pdfbooks.nl

## Project structure
<!-- You can not trust tabs here for a correct result so we use spaces instead -->
<pre>
- core/                 -- This keeps our most important framework files
- app/                  -- All our MVC stuff goes in here
    - model/                -- Our MVC Model
    - view/                 -- Our MVC Views 
    - contollers/           -- Our MVC Controllers 
- config/               -- All our config files goe in here
    - config.php            -- General personal configuration for your installation
    - init.php              -- This links the public/index.php to the framework
    - routes.php            -- This file links a url to a function in a controller
    ...
- public/               -- This wil be the root of our application
    - assets/               -- Contains all assets for the web-application
    - index.php             -- Root file
</pre>
