Fresh Symfony
=============
Provides a [Fresh Symfony][1] to start your application quickly.

Getting started
---------------
Download the [latest stable release (tar.gz)][2] inherited from [Symfony 2.3][3]

If you don't have [Composer][4] yet, run the following command:
```bash
curl -s http://getcomposer.org/installer | php
```

Then, run the install command:
```bash
php composer.phar --prefer-dist install
```

Executing Unit tests
--------------------
[Fresh Symfony][1] embed [phpunit 4.x release][5] in developement.

To run tests:
```bash
./bin/phpunit -c app/
```

To create tests follow [Symfony documentation][6] or copy paste sample into your bundle at `src/Bundle/<YourName>/<YourBundleName>/Tests/`.


  [1]: https://bitbucket.org/kmelia/fresh-symfony
  [2]: https://bitbucket.org/kmelia/fresh-symfony/get/2.3.x-0.1.tar.gz
  [3]: https://github.com/symfony/symfony-standard/tree/2.3
  [4]: http://getcomposer.org/
  [5]: http://phpunit.de/manual/current/en/
  [6]: http://symfony.com/fr/doc/current/book/testing.html
