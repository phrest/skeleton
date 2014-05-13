PhREST Skeleton Project
====================

A Phalcon REST skeleton project, uses PhREST to provide
a PHP REST API based on Phalcon PHP.

Installation
------------

You can use the Vagrant box available at: https://github.com/phrest/box
The box will automatically set everything up for you, simply add the hosts
to your machine, see: https://github.com/phrest/box/blob/master/hosts
and you will be able to access the API via http://skeleton.phrest.dev/v1/users

If you are NOT using the "box":
 - Clone the skeleton to your desired location, i.e. /var/www/skeleton
 - Create the MySQL DB and import "skeleton.sql" (in the /schemas directory)
 - Configure the MySQL DB (config.ini in the /src/Config directory)

Usage
-----

This is a REST API, so it works using the following HTTP methods:
- GET (Read): Gets a list of items, or a single item
- POST (Create): Creates an item
- PUT (Update): Updates and item
- DELETE: Deletes and item

To see an example, in your browser simply request (GET) the following URLs:

GET: http://skeleton.phrest.dev/v1/users
- Will return a list of users

GET: http://skeleton.phrest.dev/v1/users/1
- Will return the "User 1"

The same applies for the rest of the HTTP methods (GET, POST, PUT, DELETE).

POST: http://skeleton.phrest.dev/v1/users
- Will create a User

PUT: http://skeleton.phrest.dev/v1/users/1
- Will update "User 1"

DELETE: http://skeleton.phrest.dev/v1/users/1
- Will delete "User 1"

