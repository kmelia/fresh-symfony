Fresh Symfony
=============
[![Build Status](https://magnum-ci.com/status/b9d4cccf813ad43c794cbb822e8f2f9c.png)](https://magnum-ci.com/public/6c526f21990a8688e44d/builds)

Provides a [Fresh Symfony][1] to start your application quickly.

The application is based on the **current LTS version**, according to the [Symfony Roadmap][8].

Getting started
---------------
**1.** Download the [**latest stable release** [tar.gz]][2] inherited from [Symfony 2.3][3].

**2.** If you don't have [Composer][4] yet, run the following command:
```bash
curl -sS https://getcomposer.org/installer | php
```

**3.** Then, run the following commands:
```bash
php composer.phar --prefer-dist install
php app/console --env=dev assets:install web --symlink --relative
```

**4.** Finally, [configure your project][7].

That's it!

Executing Unit tests
--------------------
[Fresh Symfony][1] embed [phpunit 4.x release][5] in developement.

To run tests:
```bash
./bin/phpunit -c app/
```

To create tests follow [Symfony documentation][6] or copy paste sample into your bundle at `src/Bundle/<YourName>/<YourBundleName>/Tests/`.


  [1]: https://bitbucket.org/kmelia/fresh-symfony
  [2]: https://bitbucket.org/kmelia/fresh-symfony/get/2.3.x-0.5.tar.gz
  [3]: https://github.com/symfony/symfony-standard/tree/2.3
  [4]: https://getcomposer.org/
  [5]: https://phpunit.de/manual/current/en/
  [6]: https://symfony.com/fr/doc/current/book/testing.html
  [7]: https://bitbucket.org/kmelia/fresh-symfony/src/master/CONFIGURE.md
  [8]: https://symfony.com/roadmap
