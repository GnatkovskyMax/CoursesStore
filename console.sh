#!/bin/bash

docker-compose exec php-fpm php bin/console $@
