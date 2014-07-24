Fresh Symfony
=============

Provides a [fresh symfony][1] to start your application quickly.

Getting started
---------------

If you don't have [Composer][2] yet, run the following command:
```bash
curl -s http://getcomposer.org/installer | php
```

Then, run the install command:
```bash
php composer.phar --prefer-dist install
```

Executing Unit tests
--------------------

Fresh symfony embed phpunit 4.x release in developement
To run tests
```bash
./bin/phpunit -c app/
```

To create tests follow [symfony documentation][3]

Or copy paste sample into your bundle at path : src/Bundle/Kmelia/FreshBundle/Tests/* to src/Bundle/<your_name>/<your_bundle_name>/Tests/

  [1]: https://bitbucket.org/kmelia/fresh-symfony
  [2]: http://getcomposer.org/
  [3]: http://symfony.com/fr/doc/current/book/testing.html
