FROM richarvey/nginx-php-fpm:1.5.0

RUN apk update

RUN apk add \
  mysql-client \
  openssl \
  msmtp

# Configure msmtp
RUN { \
    echo "account default"; \
    echo "host mailhog"; \
    echo "port 1025"; \
    echo "auto_from on"; \
  } > /etc/msmtprc

# Configure PHP to use msmtp for sending mail
RUN { \
    echo 'sendmail_path = "/usr/bin/msmtp -t -i"'; \
  } > /usr/local/etc/php/conf.d/mail.ini

# Install and configure WP CLI
RUN wget https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar; \
	chmod +x wp-cli.phar; \
	mv wp-cli.phar /usr/local/bin/; \
	# Workaround for root usage scolding.
	echo -e "#!/bin/bash\n\n/usr/local/bin/wp-cli.phar \"\$@\" --allow-root\n" > /usr/local/bin/wp; \
	chmod +x /usr/local/bin/wp; \
	# Add bash completons for interactive usage.
	wget https://github.com/wp-cli/wp-cli/raw/master/utils/wp-completion.bash; \
	mv wp-completion.bash $HOME; \
	echo -e "source $HOME/wp-completion.bash\n" > $HOME/.bashrc

# Download WordPress
RUN wp core download --version=5.2.2

# Copy custom configuration files into location expected by nginx-php-fpm.
# See https://github.com/richarvey/nginx-php-fpm/blob/master/docs/nginx_configs.md
COPY wp/conf /var/www/html/conf

# Copy startup scripts into location expected by nginx-php-fpm.
# See https://github.com/richarvey/nginx-php-fpm/blob/master/docs/scripting_templating.md
COPY wp/scripts /var/www/html/scripts

# Copy the uploads into place
COPY wp/uploads /var/www/html/wp-content/uploads

