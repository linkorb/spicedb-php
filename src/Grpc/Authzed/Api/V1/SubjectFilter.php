<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: permission_service.proto

namespace Authzed\Api\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * SubjectFilter specifies a filter on the subject of a relationship.
 * subject_type is required and all other fields are optional, and will not
 * impose any additional requirements if left unspecified.
 *
 * Generated from protobuf message <code>authzed.api.v1.SubjectFilter</code>
 */
class SubjectFilter extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string subject_type = 1 [(.validate.rules) = {</code>
     */
    protected $subject_type = '';
    /**
     * Generated from protobuf field <code>string optional_subject_id = 2 [(.validate.rules) = {</code>
     */
    protected $optional_subject_id = '';
    /**
     * Generated from protobuf field <code>.authzed.api.v1.SubjectFilter.RelationFilter optional_relation = 3;</code>
     */
    protected $optional_relation = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $subject_type
     *     @type string $optional_subject_id
     *     @type \Authzed\Api\V1\SubjectFilter\RelationFilter $optional_relation
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\PermissionService::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string subject_type = 1 [(.validate.rules) = {</code>
     * @return string
     */
    public function getSubjectType()
    {
        return $this->subject_type;
    }

    /**
     * Generated from protobuf field <code>string subject_type = 1 [(.validate.rules) = {</code>
     * @param string $var
     * @return $this
     */
    public function setSubjectType($var)
    {
        GPBUtil::checkString($var, True);
        $this->subject_type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string optional_subject_id = 2 [(.validate.rules) = {</code>
     * @return string
     */
    public function getOptionalSubjectId()
    {
        return $this->optional_subject_id;
    }

    /**
     * Generated from protobuf field <code>string optional_subject_id = 2 [(.validate.rules) = {</code>
     * @param string $var
     * @return $this
     */
    public function setOptionalSubjectId($var)
    {
        GPBUtil::checkString($var, True);
        $this->optional_subject_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.authzed.api.v1.SubjectFilter.RelationFilter optional_relation = 3;</code>
     * @return \Authzed\Api\V1\SubjectFilter\RelationFilter|null
     */
    public function getOptionalRelation()
    {
        return $this->optional_relation;
    }

    public function hasOptionalRelation()
    {
        return isset($this->optional_relation);
    }

    public function clearOptionalRelation()
    {
        unset($this->optional_relation);
    }

    /**
     * Generated from protobuf field <code>.authzed.api.v1.SubjectFilter.RelationFilter optional_relation = 3;</code>
     * @param \Authzed\Api\V1\SubjectFilter\RelationFilter $var
     * @return $this
     */
    public function setOptionalRelation($var)
    {
        GPBUtil::checkMessage($var, \Authzed\Api\V1\SubjectFilter\RelationFilter::class);
        $this->optional_relation = $var;

        return $this;
    }

}

