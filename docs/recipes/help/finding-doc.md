---
Title:    Finding Documentation
Topics:   Carbon, Composer, documentation, help, Laravel API, Monolog, Swift
          Mailer, Symfony
Code:     -
Id:       13
Position: 1
---

{problem}
You need help with a class or method.

You know that Laravel is constantly evolving and want to find the most recent source of helpful information about a specific class or method.
{/problem}

{solution}
Visit Laravel Docs.

Your first stop should be the official web site, [Laravel.com](http://laravel.com/docs). This site contains the _Official_ documentation for the latest version.

Another great source is the [Laravel API](http://laravel.com/api) site. Here you can browse through documentation generated from the code itself.
{/solution}

{discussion}
Don't forget the packages Laravel uses.

The official Laravel sources for the documentation and API presented above are great starting points, but part of the power of Laravel is how it leverages other stable systems into it's framework using [Composer](http://getcomposer.org/).

Here's a list of some of the major components used by Laravel with links to the documentation.

* [Monolog](https://github.com/seldaek/monolog) - Laravel's `Log` facade is built on Monolog.
* [Carbon](https://github.com/briannesbitt/Carbon) - Laravel uses `Carbon`, an excellent extension to PHP's `DateTime` class.
* [Swift Mailer](http://swiftmailer.org/docs/introduction.html) - Laravel's `Mail` facade uses Swift Mailer to do the actual grunt work of composing and sending emails.
* [Symfony](http://symfony.com/doc/current/index.html) - Laravel provide many components built from Symfony components.
{/discussion}
