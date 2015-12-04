Fresh Symfony 2.7 LTS
=====================
[![Build Status](https://travis-ci.org/kmelia/fresh-symfony.svg?branch=release/2.7_LTS)](https://travis-ci.org/kmelia/fresh-symfony/branches)

> **Caution**: You are browsing the 2.7 LTS part of this repository.

Provides a [**Fresh Symfony**][1] to start your application quickly.

The application is based on the **2.7 LTS version** (*end of support: May 2019*), check to the [Symfony Roadmap][4].

Getting started
---------------
**1.** Download the [**latest stable 2.7 release** [tar.gz]][2] inherited from [Symfony 2.7][3].

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
  [2]: https://bitbucket.org/kmelia/fresh-symfony/get/release/2.7_LTS.tar.gz "Latest stable 2.7 release of Fresh Symfony"
  [3]: https://github.com/symfony/symfony-standard/tree/2.7 "The 2.7 LTS version"
  [4]: https://symfony.com/roadmap "Symfony roadmap"
  [5]: https://phpunit.de/manual/current/en/ "4.x release"
  [6]: https://symfony.com/fr/doc/current/book/testing.html "Symfony documentation"
  [7]: https://bitbucket.org/kmelia/fresh-symfony/src/release/2.7_LTS/CONFIGURE.md "Fresh Symfony documentation"
