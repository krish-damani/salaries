#https://buddy.works/guides/how-dockerize-node-application

FROM php:7.4-cli

WORKDIR /app

#COPY [composer.json, composer.lock] /app/

#RUN composer install

COPY . /app

CMD php index.php

# EXPOSE 3000

# sudo docker build -t dineshrabara/salaries .
# sudo docker run -p 3000:3000 dineshrabara/salaries
# sudo docker push dineshrabara/salaries
# sudo docker exec -it 7efd3ea934a9 /bin/sh