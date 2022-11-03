<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Response;

use LinkORB\Authzed\Dto\PermissionsRelationshipTree;
use LinkORB\Authzed\Dto\ZedToken;

class PermissionExpand
{
    private ?ZedToken $expandedAt;
    private ?PermissionsRelationshipTree $treeRoot;

    public function __construct(ZedToken $expandedAt = null, PermissionsRelationshipTree $treeRoot = null)
    {
        $this->expandedAt = $expandedAt;
        $this->treeRoot   = $treeRoot;
    }

    public function getExpandedAt(): ?ZedToken
    {
        return $this->expandedAt;
    }

    public function getTreeRoot(): ?PermissionsRelationshipTree
    {
        return $this->treeRoot;
    }

    public function setExpandedAt(?ZedToken $expandedAt): self
    {
        $this->expandedAt = $expandedAt;
        return $this;
    }

    public function setTreeRoot(?PermissionsRelationshipTree $treeRoot): self
    {
        $this->treeRoot = $treeRoot;
        return $this;
    }
}
