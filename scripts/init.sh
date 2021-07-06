#!/bin/bash

set -e

IMAGE_NUMBER="latest"
docker build -t "infuse_media_php:$IMAGE_NUMBER" -f docker/php/Dockerfile .
docker build -t "infuse_media_nginx:$IMAGE_NUMBER" -f docker/nginx/Dockerfile --build-arg IMAGE_NUMBER="$IMAGE_NUMBER" .

docker-compose up -d --build
