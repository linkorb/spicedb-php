<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: core.proto

namespace Authzed\Api\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * PermissionRelationshipTree is used for representing a tree of a resource and
 * its permission relationships with other objects.
 *
 * Generated from protobuf message <code>authzed.api.v1.PermissionRelationshipTree</code>
 */
class PermissionRelationshipTree extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.authzed.api.v1.ObjectReference expanded_object = 3;</code>
     */
    protected $expanded_object = null;
    /**
     * Generated from protobuf field <code>string expanded_relation = 4;</code>
     */
    protected $expanded_relation = '';
    protected $tree_type;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Authzed\Api\V1\AlgebraicSubjectSet $intermediate
     *     @type \Authzed\Api\V1\DirectSubjectSet $leaf
     *     @type \Authzed\Api\V1\ObjectReference $expanded_object
     *     @type string $expanded_relation
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Core::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.authzed.api.v1.AlgebraicSubjectSet intermediate = 1;</code>
     * @return \Authzed\Api\V1\AlgebraicSubjectSet|null
     */
    public function getIntermediate()
    {
        return $this->readOneof(1);
    }

    public function hasIntermediate()
    {
        return $this->hasOneof(1);
    }

    /**
     * Generated from protobuf field <code>.authzed.api.v1.AlgebraicSubjectSet intermediate = 1;</code>
     * @param \Authzed\Api\V1\AlgebraicSubjectSet $var
     * @return $this
     */
    public function setIntermediate($var)
    {
        GPBUtil::checkMessage($var, \Authzed\Api\V1\AlgebraicSubjectSet::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.authzed.api.v1.DirectSubjectSet leaf = 2;</code>
     * @return \Authzed\Api\V1\DirectSubjectSet|null
     */
    public function getLeaf()
    {
        return $this->readOneof(2);
    }

    public function hasLeaf()
    {
        return $this->hasOneof(2);
    }

    /**
     * Generated from protobuf field <code>.authzed.api.v1.DirectSubjectSet leaf = 2;</code>
     * @param \Authzed\Api\V1\DirectSubjectSet $var
     * @return $this
     */
    public function setLeaf($var)
    {
        GPBUtil::checkMessage($var, \Authzed\Api\V1\DirectSubjectSet::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.authzed.api.v1.ObjectReference expanded_object = 3;</code>
     * @return \Authzed\Api\V1\ObjectReference|null
     */
    public function getExpandedObject()
    {
        return $this->expanded_object;
    }

    public function hasExpandedObject()
    {
        return isset($this->expanded_object);
    }

    public function clearExpandedObject()
    {
        unset($this->expanded_object);
    }

    /**
     * Generated from protobuf field <code>.authzed.api.v1.ObjectReference expanded_object = 3;</code>
     * @param \Authzed\Api\V1\ObjectReference $var
     * @return $this
     */
    public function setExpandedObject($var)
    {
        GPBUtil::checkMessage($var, \Authzed\Api\V1\ObjectReference::class);
        $this->expanded_object = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string expanded_relation = 4;</code>
     * @return string
     */
    public function getExpandedRelation()
    {
        return $this->expanded_relation;
    }

    /**
     * Generated from protobuf field <code>string expanded_relation = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setExpandedRelation($var)
    {
        GPBUtil::checkString($var, True);
        $this->expanded_relation = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getTreeType()
    {
        return $this->whichOneof("tree_type");
    }

}

