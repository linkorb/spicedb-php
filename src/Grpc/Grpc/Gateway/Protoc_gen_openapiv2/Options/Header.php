<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: protoc-gen-openapiv2/options/openapiv2.proto

namespace Grpc\Gateway\Protoc_gen_openapiv2\Options;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * `Header` is a representation of OpenAPI v2 specification's Header object.
 * See: https://github.com/OAI/OpenAPI-Specification/blob/3.0.0/versions/2.0.md#headerObject
 *
 * Generated from protobuf message <code>grpc.gateway.protoc_gen_openapiv2.options.Header</code>
 */
class Header extends \Google\Protobuf\Internal\Message
{
    /**
     * `Description` is a short description of the header.
     *
     * Generated from protobuf field <code>string description = 1;</code>
     */
    protected $description = '';
    /**
     * The type of the object. The value MUST be one of "string", "number", "integer", or "boolean". The "array" type is not supported.
     *
     * Generated from protobuf field <code>string type = 2;</code>
     */
    protected $type = '';
    /**
     * `Format` The extending format for the previously mentioned type.
     *
     * Generated from protobuf field <code>string format = 3;</code>
     */
    protected $format = '';
    /**
     * `Default` Declares the value of the header that the server will use if none is provided.
     * See: https://tools.ietf.org/html/draft-fge-json-schema-validation-00#section-6.2.
     * Unlike JSON Schema this value MUST conform to the defined type for the header.
     *
     * Generated from protobuf field <code>string default = 6;</code>
     */
    protected $default = '';
    /**
     * 'Pattern' See https://tools.ietf.org/html/draft-fge-json-schema-validation-00#section-5.2.3.
     *
     * Generated from protobuf field <code>string pattern = 13;</code>
     */
    protected $pattern = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $description
     *           `Description` is a short description of the header.
     *     @type string $type
     *           The type of the object. The value MUST be one of "string", "number", "integer", or "boolean". The "array" type is not supported.
     *     @type string $format
     *           `Format` The extending format for the previously mentioned type.
     *     @type string $default
     *           `Default` Declares the value of the header that the server will use if none is provided.
     *           See: https://tools.ietf.org/html/draft-fge-json-schema-validation-00#section-6.2.
     *           Unlike JSON Schema this value MUST conform to the defined type for the header.
     *     @type string $pattern
     *           'Pattern' See https://tools.ietf.org/html/draft-fge-json-schema-validation-00#section-5.2.3.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\ProtocGenOpenapiv2\Options\Openapiv2::initOnce();
        parent::__construct($data);
    }

    /**
     * `Description` is a short description of the header.
     *
     * Generated from protobuf field <code>string description = 1;</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * `Description` is a short description of the header.
     *
     * Generated from protobuf field <code>string description = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * The type of the object. The value MUST be one of "string", "number", "integer", or "boolean". The "array" type is not supported.
     *
     * Generated from protobuf field <code>string type = 2;</code>
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The type of the object. The value MUST be one of "string", "number", "integer", or "boolean". The "array" type is not supported.
     *
     * Generated from protobuf field <code>string type = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkString($var, True);
        $this->type = $var;

        return $this;
    }

    /**
     * `Format` The extending format for the previously mentioned type.
     *
     * Generated from protobuf field <code>string format = 3;</code>
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * `Format` The extending format for the previously mentioned type.
     *
     * Generated from protobuf field <code>string format = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setFormat($var)
    {
        GPBUtil::checkString($var, True);
        $this->format = $var;

        return $this;
    }

    /**
     * `Default` Declares the value of the header that the server will use if none is provided.
     * See: https://tools.ietf.org/html/draft-fge-json-schema-validation-00#section-6.2.
     * Unlike JSON Schema this value MUST conform to the defined type for the header.
     *
     * Generated from protobuf field <code>string default = 6;</code>
     * @return string
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * `Default` Declares the value of the header that the server will use if none is provided.
     * See: https://tools.ietf.org/html/draft-fge-json-schema-validation-00#section-6.2.
     * Unlike JSON Schema this value MUST conform to the defined type for the header.
     *
     * Generated from protobuf field <code>string default = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setDefault($var)
    {
        GPBUtil::checkString($var, True);
        $this->default = $var;

        return $this;
    }

    /**
     * 'Pattern' See https://tools.ietf.org/html/draft-fge-json-schema-validation-00#section-5.2.3.
     *
     * Generated from protobuf field <code>string pattern = 13;</code>
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * 'Pattern' See https://tools.ietf.org/html/draft-fge-json-schema-validation-00#section-5.2.3.
     *
     * Generated from protobuf field <code>string pattern = 13;</code>
     * @param string $var
     * @return $this
     */
    public function setPattern($var)
    {
        GPBUtil::checkString($var, True);
        $this->pattern = $var;

        return $this;
    }

}

