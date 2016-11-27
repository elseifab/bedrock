<?php
namespace Deployer;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/deployer/deployer/recipe/composer.php';

// This code is hosted in Github. Out deployment needs to fetch code checked in to the repo.
set('repository', 'git@github.com:elseifab/my-project.git');
set('shared_dirs', ['web/app/uploads']);
set('shared_files', ['.env']);

// Development connection
server('dev', 'my-project.app')
    ->set('deploy_path', '~/app/my-project')
    ->stage('development')
    ->user('vagrant')
    ->identityFile();

// Production connection, in my case a VPS with Git and Composer installed in a Ubuntu server. Using Forge as manager.
server('production', 'elseif.se', 22)
    ->set('deploy_path', '~/my-project.elseif.se')
    ->stage('production')
    ->user('forge')
    ->set('branch', 'master')
    ->identityFile();

/**
 * Install global npm packages to provide with a CasperJS engine
 */
task('startup:tests', function () {
    writeln("Setting up CasperJS to support testing...");
    $output = run("sudo npm install -g phantomjs && sudo npm install -g casperjs");
    writeln($output);
})->onlyOn('dev');

after('startup', 'startup:tests');

/**
 * Initialize a simple UI-test locally on dev
 */
task('tests', function () {
    writeln('Vagrant Unit tests with CasperJs starting up...');
    $output = run("cd ~/app/my-project && composer run-script test");
    writeln($output);
})->onlyOn('dev');
