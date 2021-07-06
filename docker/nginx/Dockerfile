ARG IMAGE_NUMBER=latest

FROM infuse_media/php:${IMAGE_NUMBER} AS php

FROM nginx:mainline-alpine

EXPOSE 8080

WORKDIR /opt/app

COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=php /opt/app/public ./public
