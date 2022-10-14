<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: permission_service.proto

namespace Authzed\Api\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * LookupResourcesResponse contains a single matching resource object ID for the
 * requested object type, permission, and subject.
 *
 * Generated from protobuf message <code>authzed.api.v1.LookupResourcesResponse</code>
 */
class LookupResourcesResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.authzed.api.v1.ZedToken looked_up_at = 1;</code>
     */
    protected $looked_up_at = null;
    /**
     * Generated from protobuf field <code>string resource_object_id = 2;</code>
     */
    protected $resource_object_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Authzed\Api\V1\ZedToken $looked_up_at
     *     @type string $resource_object_id
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\PermissionService::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.authzed.api.v1.ZedToken looked_up_at = 1;</code>
     * @return \Authzed\Api\V1\ZedToken|null
     */
    public function getLookedUpAt()
    {
        return $this->looked_up_at;
    }

    public function hasLookedUpAt()
    {
        return isset($this->looked_up_at);
    }

    public function clearLookedUpAt()
    {
        unset($this->looked_up_at);
    }

    /**
     * Generated from protobuf field <code>.authzed.api.v1.ZedToken looked_up_at = 1;</code>
     * @param \Authzed\Api\V1\ZedToken $var
     * @return $this
     */
    public function setLookedUpAt($var)
    {
        GPBUtil::checkMessage($var, \Authzed\Api\V1\ZedToken::class);
        $this->looked_up_at = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string resource_object_id = 2;</code>
     * @return string
     */
    public function getResourceObjectId()
    {
        return $this->resource_object_id;
    }

    /**
     * Generated from protobuf field <code>string resource_object_id = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setResourceObjectId($var)
    {
        GPBUtil::checkString($var, True);
        $this->resource_object_id = $var;

        return $this;
    }

}

