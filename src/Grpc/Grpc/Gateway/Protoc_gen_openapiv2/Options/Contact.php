<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: protoc-gen-openapiv2/options/openapiv2.proto

namespace Grpc\Gateway\Protoc_gen_openapiv2\Options;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * `Contact` is a representation of OpenAPI v2 specification's Contact object.
 * See: https://github.com/OAI/OpenAPI-Specification/blob/3.0.0/versions/2.0.md#contactObject
 * Example:
 *  option (grpc.gateway.protoc_gen_openapiv2.options.openapiv2_swagger) = {
 *    info: {
 *      ...
 *      contact: {
 *        name: "gRPC-Gateway project";
 *        url: "https://github.com/grpc-ecosystem/grpc-gateway";
 *        email: "none&#64;example.com";
 *      };
 *      ...
 *    };
 *    ...
 *  };
 *
 * Generated from protobuf message <code>grpc.gateway.protoc_gen_openapiv2.options.Contact</code>
 */
class Contact extends \Google\Protobuf\Internal\Message
{
    /**
     * The identifying name of the contact person/organization.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    protected $name = '';
    /**
     * The URL pointing to the contact information. MUST be in the format of a
     * URL.
     *
     * Generated from protobuf field <code>string url = 2;</code>
     */
    protected $url = '';
    /**
     * The email address of the contact person/organization. MUST be in the format
     * of an email address.
     *
     * Generated from protobuf field <code>string email = 3;</code>
     */
    protected $email = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           The identifying name of the contact person/organization.
     *     @type string $url
     *           The URL pointing to the contact information. MUST be in the format of a
     *           URL.
     *     @type string $email
     *           The email address of the contact person/organization. MUST be in the format
     *           of an email address.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\ProtocGenOpenapiv2\Options\Openapiv2::initOnce();
        parent::__construct($data);
    }

    /**
     * The identifying name of the contact person/organization.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The identifying name of the contact person/organization.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * The URL pointing to the contact information. MUST be in the format of a
     * URL.
     *
     * Generated from protobuf field <code>string url = 2;</code>
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * The URL pointing to the contact information. MUST be in the format of a
     * URL.
     *
     * Generated from protobuf field <code>string url = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->url = $var;

        return $this;
    }

    /**
     * The email address of the contact person/organization. MUST be in the format
     * of an email address.
     *
     * Generated from protobuf field <code>string email = 3;</code>
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * The email address of the contact person/organization. MUST be in the format
     * of an email address.
     *
     * Generated from protobuf field <code>string email = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setEmail($var)
    {
        GPBUtil::checkString($var, True);
        $this->email = $var;

        return $this;
    }

}

