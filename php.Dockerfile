FROM php:7.4

RUN echo 'root:Docker!' | chpasswd

RUN apt-get -qq update && apt-get -qq install -y wget

RUN wget https://github.com/authzed/zed/releases/download/v0.10.0/zed_0.10.0_linux_arm64.deb
RUN dpkg -i zed_0.10.0_linux_arm64.deb
ENV ZED_KEYRING_PASSWORD=Docker!
RUN zed context set blog spicedb:50051 somerandomkeyhere
