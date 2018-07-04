#!/bin/sh
if [ -z "$1" ] ; then
    php vendor/bin/doctrine-migrations migrate
    exit
fi

direction='down'

case $2 in
    "u") direction='up';;
esac

if [ $1 = "diff" ] ; then
    php vendor/bin/doctrine-migrations migrations:diff
    exit
fi

php vendor/bin/doctrine-migrations migrations:execute $1 --$direction
