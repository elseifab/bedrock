#!/bin/bash

sudo apt-get update

declare -a packages=(
    "graphviz"
    "language-pack-sv"
    "nodejs"
    "npm"
    "nodejs-legacy"
    "supervisor"
    "unzip"
    "zip"
)

for package in "${packages[@]}"
do
    echo ${package}
    sudo apt-get install ${package}
done

#===============================================================================
# PHP Deployer
curl -sLO http://deployer.org/deployer.phar && sudo mv deployer.phar /usr/local/bin/dep && sudo chmod +x /usr/local/bin/dep
#===============================================================================

if ! [ -f .env ]; then
    cd MyProject
    cp .env.example .env
fi
