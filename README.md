Employee search for given Budget
==================================

This Yii 2 template has the code for creating, updating, viewing and deleting employee data from database.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The frontend tier can be used to fetch the employee data for given budget
The backend tier can be used to view, create, update and delete the employee information

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

Steps for installing this template
=========================================
Make sure you have php, apache and mysql is installed on your machine before you proceed further.

Check php by using `php -v`
Output should be like : 
PHP 5.6.25 (cli) (built: Sep  6 2016 16:37:16) 
Copyright (c) 1997-2016 The PHP Group
Zend Engine v2.6.0, Copyright (c) 1998-2016 Zend Technologies

Check apache by using `apachectl -v`
Output should be like :
Server version: Apache/2.4.23 (Unix)
Server built:   Aug  8 2016 16:31:34

Check mysql by using `which mysql`
Output should be like :
/usr/local/bin/mysql

Once you ensure you have entire stack, pull the latest version of code to your folder.

To pull the code : 
`git clone https://github.com/ratnalevi/darwin.git youfolder/darwin`

Once the latest code has been fechted, configure the urls and paths.
Apache config file :
Path ( in general unix machines ) : /etc/apache2/extra/httpd-vhosts.conf
Add the following virtual hosts

<VirtualHost *:80>
    ServerAdmin levi@darwinbox.com
    DocumentRoot "yourfolder/darwin/fronend"
    ServerName frontend.darwinbox.com
    ServerAlias www.frontend.darwinbox.com
</VirtualHost>

<VirtualHost *:80>
   ServerAdmin levi@darwinbox.com
    DocumentRoot "yourfolder/darwin/backend"
    ServerName backend.darwinbox.com
    ServerAlias www.backend.darwinbox.com
</VirtualHost>

Once done add these host entries in your hosts file.
Path ( in general unix machines ) : /etc/hosts

127.0.0.1 backend.darwinbox.com
127.0.0.1 frontend.darwinbox.com

Now comes the configuration for database.
We use main-local.php for configuring the database, since db configurations will be different for different environments we will not upload this to git code.
If not present create a file "main-local.php" in common/config.

Make sure you have the following db component in your config file.

<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost:8889;dbname=employee',
            'username' => 'root',
            'password' => 'master',
            'charset' => 'utf8',
        ],
    ],
];

Make sure you configure your db port properly in the above configuration.

After doing these configurations, restart your web server ( assuming apache ) by using `apachectl restart`

With all the above changes, now you are ready to use the template.

-> frontend.darwinbox.com / www.frontend.darwinbox.com to search for employees with in a given budget.
-> frontend.darwinbox.com / www.frontend.darwinbox.com to view, update, create and delete employee data.

Before proceeding further, we need to create the database, tables and its structure.
To do this you can use our migration script.
Make sure you create a database named "employee" before running the migration script.

Before creating our tables, better to have a migrate down to delete if any tables with same name exists already.
` ./yii migrate down`
`./yii migrate up`

Once the database is setup and tables loaded, we can use console scripts to randomize data.

Coming to console part, this template has a console script to generate random employee data.

To generate employee data, use the command ` php yii employee/load-data` from your root directory.
The script asks for number of employees as input and whether to add to the existing data or recreate entire data.
The script uses faker class to create name of the employee
If any error in the above transaction, you will get a message showing the error, else the summary of data loaded.

With this the setup has been completed.

Go to frontend.darwinbox.com and click on signup to create a user to use the product.
Once user created you can use the same user for both backend and fronend applications.

Once the data is loaded, you can open backend.darwinbox.com 
