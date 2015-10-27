Fresh Symfony
=============
[![Build Status](https://travis-ci.org/kmelia/fresh-symfony.svg?branch=master)](https://travis-ci.org/kmelia/fresh-symfony/branches)

Provides a [**Fresh Symfony**][1] to start your application quickly.

The application is based on the **current LTS version**, according to the [Symfony Roadmap][4].

*You can found the 2.3 LTS part of this repository [here][8].*

Getting started
---------------
**1.** Download the [**latest stable release** [tar.gz]][2] inherited from [Symfony 2.7][3].

**2.** Then, run the following commands:
```bash
./phing.sh composer.install
php app/console --env=dev assets:install web --symlink --relative
```

**3.** Finally, [configure your project][7].

That's it!

Executing Unit tests
--------------------

The application embeds the [PHPUnit][5] testing framework on the development environment.

Follow the [Symfony documentation][6] to create your unit test or copy/paste one the samples into your bundle at `src/Bundle/<YourName>/<YourBundleName>/Tests/`.

To run the unit tests:
```bash
./phing.sh phpunit.run
```


  [1]: https://bitbucket.org/kmelia/fresh-symfony "Fresh Symfony"
  [2]: https://bitbucket.org/kmelia/fresh-symfony/get/2.7_LTS-0.2.tar.gz "Latest stable release of Fresh Symfony"
  [3]: https://github.com/symfony/symfony-standard/tree/2.7 "The current LTS version is 2.7"
  [4]: https://symfony.com/roadmap "Symfony roadmap"
  [5]: https://phpunit.de/manual/current/en/ "4.x release"
  [6]: https://symfony.com/fr/doc/current/book/testing.html "Symfony documentation"
  [7]: https://bitbucket.org/kmelia/fresh-symfony/src/master/CONFIGURE.md "Fresh Symfony documentation"
  [8]: https://bitbucket.org/kmelia/fresh-symfony/src/release/2.3_LTS/README.md "Fresh Symfony 2.3 LTS"
