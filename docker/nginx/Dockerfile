FROM nginx:1.25.3-alpine

COPY ./docker/nginx/conf /etc/nginx/conf.d

WORKDIR /var/www/html/symfony7

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]