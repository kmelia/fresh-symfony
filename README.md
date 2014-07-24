Fresh Symfony
=============
Provides a [Fresh Symfony][1] to start your application quickly.

Getting started
---------------
Download the [latest stable release (tar.gz)][4] inherited from [Symfony 2.3][5]

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
[Fresh Symfony][1] embed [phpunit 4.x release][6] in developement.

To run tests
```bash
./bin/phpunit -c app/
```

To create tests follow [Symfony documentation][3] or copy paste sample into your bundle at `src/Bundle/<YourName>/<YourBundleName>/Tests/`.


  [1]: https://bitbucket.org/kmelia/fresh-symfony
  [2]: http://getcomposer.org/
  [3]: http://symfony.com/fr/doc/current/book/testing.html
  [4]: https://bitbucket.org/kmelia/fresh-symfony/get/2.3.x-0.1.tar.gz
  [5]: https://github.com/symfony/symfony-standard/tree/2.3
  [6]: http://phpunit.de/manual/current/en/
