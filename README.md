Phalcon API Skeleton Project
====================

A Phalcon REST skeleton project, uses https://github.com/torches/phalcon-api to
achieve a PHP REST API based on Phalcon PHP.

Installation
------------

- Clone it
- Create the DB (.sql in the /schemas directory)
- Configure the DB (config.ini in the /src/Config directory)

Usage
-----

This is a REST API, so it works using the following HTTP methods:
- GET (Read): Gets a list of items, or a single item
- POST (Create): Creates an item
- PUT (Update): Updates and item
- DELETE: Deletes and item

To see an example, in your browser simply request (GET) the following URLs:

GET: /v1/users
- Will return a list of users

GET: /v1/users/1
- Will return the "User 1"

The same applies for the rest of the HTTP methods (GET, POST, PUT, DELETE).

POST: /v1/users
- Will create a User

PUT: /v1/users/1
- Will update "User 1"

DELETE: /v1/users/1
- Will delete "User 1"

