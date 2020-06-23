FROM centos:7.6.1810

MAINTAINER xiaonian <xiaonian040@163.com>

#version defined
ENV SWOOLE_VERSION 4.4.16

#install libs
RUN yum install -y curl  wget openssl-devel gcc-c++ make

#install php
RUN yum install -y epel-release
RUN rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
RUN yum -y remove php*
RUN yum -y install php72w-cli php72w-fpm php72w-common php72w-mbstring php72w-devel

# composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/bin/composer

# use aliyun composer
RUN composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/

# swoole ext
RUN wget https://github.com/swoole/swoole-src/archive/v${SWOOLE_VERSION}.tar.gz -O swoole.tar.gz \
  && mkdir -p swoole \
  && tar -xf swoole.tar.gz -C swoole --strip-components=1 \
  && rm swoole.tar.gz \
  && ( \
    cd swoole \
    && phpize \
    && ./configure --enable-openssl \
    && make \
    && make install \
  ) \
  && sed -i "2i extension=swoole.so" /etc/php.ini \
  && rm -r swoole

# Dir
WORKDIR /infobird_data_api

RUN cd /infobird_data_api

COPY [".","."]

# install 服务
RUN composer install

EXPOSE 9501

CMD ["php", "easyswoole", "start"]
