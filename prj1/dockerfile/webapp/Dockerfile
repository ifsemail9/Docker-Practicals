FROM ubuntu

# File Author / Maintainer
MAINTAINER ArunaD 

# Update the repository sources list
RUN apt-get update

# Install and run apache
RUN apt-get install -y apache2 \
    #[NOTE - Ignore Key Board Inputs DEBIAN_FRONTEND=noninteractive while image building]
    && DEBIAN_FRONTEND=noninteractive TZ=Etc/UTC apt-get -y install tzdata \
    && apt-get install -y libapache2-mod-php php-mysql \
    && apt-get clean

EXPOSE 80

RUN echo "This Server is READY!!!" > /var/www/html/index.html \
    && echo "PHP INFO - info.php" >> /var/www/html/index.html \
    && echo "<?php phpinfo(); ?>" > /var/www/html/info.php

# COpy the Dir to the image
RUN mkdir /var/www/html/phpapp

#This is not working - so using volumes
#ADD /home/apd/projects/prac-web-appphpapp/phpapp/chkdb.php /var/www/html/phpapp/

CMD apachectl -D FOREGROUND