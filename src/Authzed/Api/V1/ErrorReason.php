<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: error_reason.proto

namespace Authzed\Api\V1;

use UnexpectedValueException;

/**
 * Defines the supported values for `google.rpc.ErrorInfo.reason` for the
 * `authzed.com` error domain.
 *
 * Protobuf type <code>authzed.api.v1.ErrorReason</code>
 */
class ErrorReason
{
    /**
     * Do not use this default value.
     *
     * Generated from protobuf enum <code>ERROR_REASON_UNSPECIFIED = 0;</code>
     */
    const ERROR_REASON_UNSPECIFIED = 0;
    /**
     * The request gave a schema that could not be parsed.
     * Example of an ErrorInfo:
     *     { "reason": "ERROR_REASON_SCHEMA_PARSE_ERROR",
     *       "domain": "authzed.com",
     *       "metadata": {
     *         "start_line_number": "1",
     *         "start_column_position": "19",
     *         "end_line_number": "1",
     *         "end_column_position": "19",
     *         "source_code": "somedefinition",
     *       }
     *     }
     * The line numbers and column positions are 0-indexed and may not be present.
     *
     * Generated from protobuf enum <code>ERROR_REASON_SCHEMA_PARSE_ERROR = 1;</code>
     */
    const ERROR_REASON_SCHEMA_PARSE_ERROR = 1;
    /**
     * The request contains a schema with a type error.
     * Example of an ErrorInfo:
     *     { "reason": "ERROR_REASON_SCHEMA_TYPE_ERROR",
     *       "domain": "authzed.com",
     *       "metadata": {
     *         "definition_name": "somedefinition",
     *         ... additional keys based on the kind of type error ...
     *       }
     *     }
     *
     * Generated from protobuf enum <code>ERROR_REASON_SCHEMA_TYPE_ERROR = 2;</code>
     */
    const ERROR_REASON_SCHEMA_TYPE_ERROR = 2;
    /**
     * The request referenced an unknown object definition in the schema.
     * Example of an ErrorInfo:
     *     { "reason": "ERROR_REASON_UNKNOWN_DEFINITION",
     *       "domain": "authzed.com",
     *       "metadata": {
     *         "definition_name": "somedefinition"
     *       }
     *     }
     *
     * Generated from protobuf enum <code>ERROR_REASON_UNKNOWN_DEFINITION = 3;</code>
     */
    const ERROR_REASON_UNKNOWN_DEFINITION = 3;
    /**
     * The request referenced an unknown relation or permission under a definition in the schema.
     * Example of an ErrorInfo:
     *     { "reason": "ERROR_REASON_UNKNOWN_RELATION_OR_PERMISSION",
     *       "domain": "authzed.com",
     *       "metadata": {
     *         "definition_name": "somedefinition",
     *         "relation_or_permission_name": "somepermission"
     *       }
     *     }
     *
     * Generated from protobuf enum <code>ERROR_REASON_UNKNOWN_RELATION_OR_PERMISSION = 4;</code>
     */
    const ERROR_REASON_UNKNOWN_RELATION_OR_PERMISSION = 4;
    /**
     * The WriteRelationships request contained more updates than the maximum configured.
     * Example of an ErrorInfo:
     *     { "reason": "ERROR_REASON_TOO_MANY_UPDATES_IN_REQUEST",
     *       "domain": "authzed.com",
     *       "metadata": {
     *         "update_count": "525",
     *         "maximum_updates_allowed": "500",
     *       }
     *     }
     *
     * Generated from protobuf enum <code>ERROR_REASON_TOO_MANY_UPDATES_IN_REQUEST = 5;</code>
     */
    const ERROR_REASON_TOO_MANY_UPDATES_IN_REQUEST = 5;
    /**
     * The request contained more preconditions than the maximum configured.
     * Example of an ErrorInfo:
     *     { "reason": "ERROR_REASON_TOO_MANY_PRECONDITIONS_IN_REQUEST",
     *       "domain": "authzed.com",
     *       "metadata": {
     *         "precondition_count": "525",
     *         "maximum_preconditions_allowed": "500",
     *       }
     *     }
     *
     * Generated from protobuf enum <code>ERROR_REASON_TOO_MANY_PRECONDITIONS_IN_REQUEST = 6;</code>
     */
    const ERROR_REASON_TOO_MANY_PRECONDITIONS_IN_REQUEST = 6;
    /**
     * The request contained a precondition that failed.
     * Example of an ErrorInfo:
     *     { "reason": "ERROR_REASON_WRITE_OR_DELETE_PRECONDITION_FAILURE",
     *       "domain": "authzed.com",
     *       "metadata": {
     *         "precondition_resource_type": "document",
     *         ... other fields for the filter ...
     *         "precondition_operation": "MUST_EXIST",
     *       }
     *     }
     *
     * Generated from protobuf enum <code>ERROR_REASON_WRITE_OR_DELETE_PRECONDITION_FAILURE = 7;</code>
     */
    const ERROR_REASON_WRITE_OR_DELETE_PRECONDITION_FAILURE = 7;
    /**
     * A write or delete request was made to an instance that is deployed in read-only mode.
     * Example of an ErrorInfo:
     *     { "reason": "ERROR_REASON_SERVICE_READ_ONLY",
     *       "domain": "authzed.com"
     *     }
     *
     * Generated from protobuf enum <code>ERROR_REASON_SERVICE_READ_ONLY = 8;</code>
     */
    const ERROR_REASON_SERVICE_READ_ONLY = 8;
    /**
     * The request referenced an unknown caveat in the schema.
     * Example of an ErrorInfo:
     *     { "reason": "ERROR_REASON_UNKNOWN_CAVEAT",
     *       "domain": "authzed.com",
     *       "metadata": {
     *         "caveat_name": "somecaveat"
     *       }
     *     }
     *
     * Generated from protobuf enum <code>ERROR_REASON_UNKNOWN_CAVEAT = 9;</code>
     */
    const ERROR_REASON_UNKNOWN_CAVEAT = 9;
    /**
     * The request tries to use a subject type that was not valid for a relation.
     * Example of an ErrorInfo:
     *     { "reason": "ERROR_REASON_INVALID_SUBJECT_TYPE",
     *       "domain": "authzed.com",
     *       "metadata": {
     *         "relation_name": "somerelation",
     *         "subject_type": "user:*"
     *       }
     *     }
     *
     * Generated from protobuf enum <code>ERROR_REASON_INVALID_SUBJECT_TYPE = 10;</code>
     */
    const ERROR_REASON_INVALID_SUBJECT_TYPE = 10;

    private static $valueToName = [
        self::ERROR_REASON_UNSPECIFIED => 'ERROR_REASON_UNSPECIFIED',
        self::ERROR_REASON_SCHEMA_PARSE_ERROR => 'ERROR_REASON_SCHEMA_PARSE_ERROR',
        self::ERROR_REASON_SCHEMA_TYPE_ERROR => 'ERROR_REASON_SCHEMA_TYPE_ERROR',
        self::ERROR_REASON_UNKNOWN_DEFINITION => 'ERROR_REASON_UNKNOWN_DEFINITION',
        self::ERROR_REASON_UNKNOWN_RELATION_OR_PERMISSION => 'ERROR_REASON_UNKNOWN_RELATION_OR_PERMISSION',
        self::ERROR_REASON_TOO_MANY_UPDATES_IN_REQUEST => 'ERROR_REASON_TOO_MANY_UPDATES_IN_REQUEST',
        self::ERROR_REASON_TOO_MANY_PRECONDITIONS_IN_REQUEST => 'ERROR_REASON_TOO_MANY_PRECONDITIONS_IN_REQUEST',
        self::ERROR_REASON_WRITE_OR_DELETE_PRECONDITION_FAILURE => 'ERROR_REASON_WRITE_OR_DELETE_PRECONDITION_FAILURE',
        self::ERROR_REASON_SERVICE_READ_ONLY => 'ERROR_REASON_SERVICE_READ_ONLY',
        self::ERROR_REASON_UNKNOWN_CAVEAT => 'ERROR_REASON_UNKNOWN_CAVEAT',
        self::ERROR_REASON_INVALID_SUBJECT_TYPE => 'ERROR_REASON_INVALID_SUBJECT_TYPE',
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
