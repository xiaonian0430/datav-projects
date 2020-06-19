FROM centos:7.6.1810

MAINTAINER xiaonian <xiaonian040@163.com>

#version defined
ENV SWOOLE_VERSION 4.5.0
ENV EASYSWOOLE_VERSION 3.3.7

#install libs
RUN yum install -y curl zip unzip  wget openssl-devel gcc-c++ make autoconf

#install php
RUN yum install -y epel-release
RUN rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
RUN yum -y remove php*
RUN yum clean all
RUN yum -y update
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
WORKDIR /vue_form_design_api

# install 服务
RUN cd /vue_form_design_api \
    && composer require easyswoole/easyswoole=${EASYSWOOLE_VERSION} \
    && php vendor/easyswoole/easyswoole/bin/easyswoole install \
    && composer require easyswoole/kafka \
    && composer require easyswoole/redis \
    && composer require nikic/fast-route \
    && composer require easyswoole/mysqli

EXPOSE 9501

CMD ["php", "easyswoole", "start"]
