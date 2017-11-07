# pdfbooks.nl

# Setup

todo


## Project structure
<!-- You can not trust tabs here for a correct result so we use spaces instead -->
<pre>
- app/                  -- All our MVC stuff goes in here
    - assets/               -- All non optimized assets
    - model/                -- Our MVC Model
    - view/                 -- Our MVC Views 
    - contollers/           -- Our MVC Controllers 
- config/               -- All configuration files
    app.php               -- This links the public/index.php to the framework
    config.php            -- General personal configuration for your installation
    routes.php            -- This file links a url to a function in a controller
    seeds.php             -- This file contains everything to rebuild the database
- core/                 -- Our most important framework files
- nonframework/         -- A collection of files that are used in the generators
- public/               -- The root of our application
    - assets/               -- Contains all assets for the web-application
    index.php             -- Root file
index.html             -- Tells you to go to the public folder
noframework.php        -- $ php ./noframework.php  for more info about this tool
</pre>


## Nice too have 
- [ ] Admin backend.
- [ ] Asset pipeline - We could minify all assets and place them afterwards in the plubic forlder.
- [ ] A better way to handle / and \ difference.
- [ ] A better way to handle Links. Maybe we can use the routes to generate static variables.
- [ ] More comments - Every class should at least be explained somewhere.
- [ ] Docblocks could also help.
- [ ] Generators that support model variables.
- [ ] Router that supports a resource function to loads the default crud urls.
- [ ] Router that supports prefixes.
- [ ] Router that supports subdomains.
- [ ] Maybe migrations ???
- [ ] A database that lets you query without writing SQL.
- [ ] A database that automaticly detects PDO:FETCHCLASS options.
- [ ] An ORM that works from the models and that lets you query them.
- [ ] A documented git flow.
- [ ] Multi language support.
- [ ] Git documentation.
- [ ] Our own frontend framework.