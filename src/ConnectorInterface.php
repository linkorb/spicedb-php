<?php declare(strict_types=1);

namespace LinkORB\Authzed;

use LinkORB\Authzed\Dto\Schema;

interface ConnectorInterface
{
    public function readSchema(): Schema;
    public function writeSchema(Schema $schema): void;
    public function checkPermission();
    public function expandPermission();
    public function showResourcesPermission();
    public function deleteRelationship();
    public function readRelationship();
    public function writeRelationship();
    public function lookupWatch();
    public function watch();
}
