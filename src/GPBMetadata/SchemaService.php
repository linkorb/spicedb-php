<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: schema_service.proto

namespace GPBMetadata;

class SchemaService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
schema_service.protoauthzed.api.v1validate/validate.proto"
ReadSchemaRequest")
ReadSchemaResponse
schema_text (	"/
WriteSchemaRequest
schema (	B	�Br(��"
WriteSchemaResponse2�

SchemaServiceo

ReadSchema!.authzed.api.v1.ReadSchemaRequest".authzed.api.v1.ReadSchemaResponse"���"/v1/schema/read:*s
WriteSchema".authzed.api.v1.WriteSchemaRequest#.authzed.api.v1.WriteSchemaResponse"���"/v1/schema/write:*BH
com.authzed.api.v1Z2github.com/authzed/authzed-go/proto/authzed/api/v1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

