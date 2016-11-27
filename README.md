# Bedrock

The project package is used as boilerplate at Elseif AB to new WordPress projects.

This project is supposed to be initialized with a `composer create-project elseif/bedrock your-project-name`.

Change all `MyProject` and `my-project` to your project name and namespace!

The package is under work in progress and will change over time.

## Requirements

* PHP >= 7
* Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

## [Bedrock](https://roots.io/bedrock/)

Roots Bedrock is the foundation.

## [Homestead Laravel](https://laravel.com/docs/5.3/homestead#per-project-installation)

Vagrant box Homestead as a "per project install".

```
vagrant up
```

## [PHP Deployer](https://deployer.org/)

Deployer scripts use PHP Deployer.

## Tests

### Requirements

* Node and CasperJS, install: `npm install -g phantomjs casperjs`

### Running tests

Run quality assurance test through composer:

```
composer run-script test
```

Checks/runs:

* PHPCS
* PHPMD
* PHPUnit

## Other

* [roots-wp-salt](https://roots.io/salts.html)
* Use Gitflow in your projects via Sourcetree or install Gitflow with brew: `brew install git-flow`.

