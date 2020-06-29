FROM centos:7.6.1810

MAINTAINER xiaonian <xiaonian040@163.com>

ENV SWOOLE_VERSION 4.5.2
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

#install libs
RUN yum install -y curl wget openssl-devel gcc-c++ make autoconf

#install php
RUN yum install -y epel-release
RUN rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
#RUN rpm -ivh https://mirrors.tuna.tsinghua.edu.cn/remi/enterprise/remi-release-7.rpm
RUN yum -y remove php*
RUN yum -y install php72w-cli php72w-fpm php72w-common php72w-mbstring php72w-devel

# swoole ext
RUN wget https://github.com/swoole/swoole-src/archive/v${SWOOLE_VERSION}.tar.gz -O swoole.tar.gz \
  && cd / \
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
  && sed -i "2i extension=swoole.so" /usr/local/php/etc/php.ini \
  && rm -r swoole

# composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/bin/composer

# use aliyun composer
RUN composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/

# Dir
WORKDIR /infobird_data_api

RUN cd /infobird_data_api

COPY [".","."]

# install 服务
RUN composer install && php vendor/easyswoole/easyswoole/bin/easyswoole install

EXPOSE 9501

CMD ["php", "easyswoole", "start"]
