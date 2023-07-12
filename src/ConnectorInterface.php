<?php declare(strict_types=1);

namespace LinkORB\Authzed;

use Generator;
use LinkORB\Authzed\Dto\Request\LookupResource as LookupResourceRequest;
use LinkORB\Authzed\Dto\Request\LookupSubject as LookupSubjectRequest;
use LinkORB\Authzed\Dto\Request\PermissionCheck as PermissionCheckRequest;
use LinkORB\Authzed\Dto\Request\PermissionExpand as PermissionExpandRequest;
use LinkORB\Authzed\Dto\Request\RelationshipDeletion as RelationshipDeletionRequest;
use LinkORB\Authzed\Dto\Request\RelationshipRead as RelationshipReadRequest;
use LinkORB\Authzed\Dto\Request\RelationshipWrite as RelationshipWriteRequest;
use LinkORB\Authzed\Dto\Request\Schema as SchemaRequest;
use LinkORB\Authzed\Dto\Request\Watch as WatchRequest;
use LinkORB\Authzed\Dto\Response\LookupResource as LookupResourceResponse;
use LinkORB\Authzed\Dto\Response\LookupSubject as LookupSubjectResponse;
use LinkORB\Authzed\Dto\Response\PermissionCheck as PermissionCheckResponse;
use LinkORB\Authzed\Dto\Response\PermissionExpand as PermissionExpandResponse;
use LinkORB\Authzed\Dto\Response\RelationshipDeletion as RelationshipDeletionResponse;
use LinkORB\Authzed\Dto\Response\RelationshipRead as RelationshipReadResponse;
use LinkORB\Authzed\Dto\Response\RelationshipWrite as RelationshipWriteResponse;
use LinkORB\Authzed\Dto\Response\Schema as SchemaResponse;
use LinkORB\Authzed\Dto\Response\Watch as WatchResponse;

interface ConnectorInterface
{
    public function readSchema(): SchemaResponse;
    public function writeSchema(SchemaRequest $request): void;
    public function checkPermission(PermissionCheckRequest $request): PermissionCheckResponse;
    public function expandPermission(PermissionExpandRequest $request): PermissionExpandResponse;
    /** @return LookupResourceResponse[] */
    public function showResourcesPermission(LookupResourceRequest $request): array;
    /** @return LookupSubjectResponse[] */
    public function showSubjectsPermission(LookupSubjectRequest $request): array;
    public function deleteRelationship(RelationshipDeletionRequest $request): RelationshipDeletionResponse;
    /** @return RelationshipReadResponse[] */
    public function readRelationship(RelationshipReadRequest $request): array;
    public function writeRelationship(RelationshipWriteRequest $request): RelationshipWriteResponse;
    /** @return Generator|WatchResponse[] */
    public function watch(WatchRequest $request, float $abortIdleTimeout): Generator;
}
