# Copyright 2019 gRPC authors.
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

FROM composer:1.8.6 as composer


FROM grpc-php/base as grpc-base


FROM php:7.2-stretch

RUN apt-get -qq update && apt-get -qq install -y git


COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY --from=grpc-base /github/grpc/cmake/build/third_party/protobuf/protoc \
  /usr/local/bin/protoc

COPY --from=grpc-base /github/grpc/cmake/build/grpc_php_plugin \
  /usr/local/bin/protoc-gen-grpc

COPY --from=grpc-base \
  /usr/local/lib/php/extensions/no-debug-non-zts-20170718/grpc.so \
  /usr/local/lib/php/extensions/no-debug-non-zts-20170718/grpc.so


RUN docker-php-ext-enable grpc

WORKDIR /app

RUN git clone https://github.com/bufbuild/protoc-gen-validate.git && git clone https://github.com/protocolbuffers/protobuf.git && git clone https://github.com/grpc-ecosystem/grpc-gateway.git && git clone https://github.com/googleapis/googleapis.git

WORKDIR /github/grpc-php

COPY . .

RUN protoc --proto_path=/app/protoc-gen-validate/ --proto_path=/app/protobuf/src/ --proto_path=/app/grpc-gateway/ --proto_path=/app/googleapis/  --proto_path=. --php_out=. --grpc_out=. core.proto
RUN protoc --proto_path=/app/protoc-gen-validate/ --proto_path=/app/protobuf/src/ --proto_path=/app/grpc-gateway/ --proto_path=/app/googleapis/  --proto_path=. --php_out=. --grpc_out=. debug.proto
RUN protoc --proto_path=/app/protoc-gen-validate/ --proto_path=/app/protobuf/src/ --proto_path=/app/grpc-gateway/ --proto_path=/app/googleapis/  --proto_path=. --php_out=. --grpc_out=. error_reason.proto
RUN protoc --proto_path=/app/protoc-gen-validate/ --proto_path=/app/protobuf/src/ --proto_path=/app/grpc-gateway/ --proto_path=/app/googleapis/  --proto_path=. --php_out=. --grpc_out=. openapi.proto
RUN protoc --proto_path=/app/protoc-gen-validate/ --proto_path=/app/protobuf/src/ --proto_path=/app/grpc-gateway/ --proto_path=/app/googleapis/  --proto_path=. --php_out=. --grpc_out=. permission_service.proto
RUN protoc --proto_path=/app/protoc-gen-validate/ --proto_path=/app/protobuf/src/ --proto_path=/app/grpc-gateway/ --proto_path=/app/googleapis/  --proto_path=. --php_out=. --grpc_out=. schema_service.proto
RUN protoc --proto_path=/app/protoc-gen-validate/ --proto_path=/app/protobuf/src/ --proto_path=/app/grpc-gateway/ --proto_path=/app/googleapis/  --proto_path=. --php_out=. --grpc_out=. watch_service.proto

CMD ["/bin/bash"]
