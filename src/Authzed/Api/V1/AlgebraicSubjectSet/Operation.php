<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: core.proto

namespace Authzed\Api\V1\AlgebraicSubjectSet;

use UnexpectedValueException;

/**
 * Protobuf type <code>authzed.api.v1.AlgebraicSubjectSet.Operation</code>
 */
class Operation
{
    /**
     * Generated from protobuf enum <code>OPERATION_UNSPECIFIED = 0;</code>
     */
    const OPERATION_UNSPECIFIED = 0;
    /**
     * Generated from protobuf enum <code>OPERATION_UNION = 1;</code>
     */
    const OPERATION_UNION = 1;
    /**
     * Generated from protobuf enum <code>OPERATION_INTERSECTION = 2;</code>
     */
    const OPERATION_INTERSECTION = 2;
    /**
     * Generated from protobuf enum <code>OPERATION_EXCLUSION = 3;</code>
     */
    const OPERATION_EXCLUSION = 3;

    private static $valueToName = [
        self::OPERATION_UNSPECIFIED => 'OPERATION_UNSPECIFIED',
        self::OPERATION_UNION => 'OPERATION_UNION',
        self::OPERATION_INTERSECTION => 'OPERATION_INTERSECTION',
        self::OPERATION_EXCLUSION => 'OPERATION_EXCLUSION',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Operation::class, \Authzed\Api\V1\AlgebraicSubjectSet_Operation::class);

