<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: schema_service.proto

namespace Authzed\Api\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * ReadSchemaResponse is the resulting data after having read the Object
 * Definitions from a Schema.
 *
 * Generated from protobuf message <code>authzed.api.v1.ReadSchemaResponse</code>
 */
class ReadSchemaResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * schema_text is the textual form of the current schema in the system
     *
     * Generated from protobuf field <code>string schema_text = 1;</code>
     */
    protected $schema_text = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $schema_text
     *           schema_text is the textual form of the current schema in the system
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\SchemaService::initOnce();
        parent::__construct($data);
    }

    /**
     * schema_text is the textual form of the current schema in the system
     *
     * Generated from protobuf field <code>string schema_text = 1;</code>
     * @return string
     */
    public function getSchemaText()
    {
        return $this->schema_text;
    }

    /**
     * schema_text is the textual form of the current schema in the system
     *
     * Generated from protobuf field <code>string schema_text = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setSchemaText($var)
    {
        GPBUtil::checkString($var, True);
        $this->schema_text = $var;

        return $this;
    }

}

