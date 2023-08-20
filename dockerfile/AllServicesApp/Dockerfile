FROM ubuntu

# File Author / Maintainer
MAINTAINER ArunaD 

# Update the repository sources list
RUN apt-get update

# Install and run apache
RUN apt-get install -y apache2 && apt-get clean

EXPOSE 80

RUN echo "This is my server" > /var/www/html/index.html

CMD apachectl -D FOREGROUND