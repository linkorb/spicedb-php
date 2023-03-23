<?php declare(strict_types=1);

namespace LinkORB\Authzed\Dto\Response;

use LinkORB\Authzed\Dto\ZedToken;

class PermissionCheck
{
    public const PERMISSIONSHIP_UNSPECIFIED            = 'PERMISSIONSHIP_UNSPECIFIED';
    public const PERMISSIONSHIP_NO_PERMISSION          = 'PERMISSIONSHIP_NO_PERMISSION';
    public const PERMISSIONSHIP_HAS_PERMISSION         = 'PERMISSIONSHIP_HAS_PERMISSION';
    public const PERMISSIONSHIP_CONDITIONAL_PERMISSION = 'PERMISSIONSHIP_CONDITIONAL_PERMISSION';

    private ?ZedToken $checkedAt;
    private ?string $permissionship;
    private ?array $partialCaveatInfo;

    public function __construct(
        ZedToken $checkedAt = null,
        string   $permissionship = null,
        array    $partialCaveatInfo = null
    )
    {
        $this->checkedAt         = $checkedAt;
        $this->permissionship    = $permissionship;
        $this->partialCaveatInfo = $partialCaveatInfo;
    }

    public function getCheckedAt(): ?ZedToken
    {
        return $this->checkedAt;
    }

    public function getPermissionship(): ?string
    {
        return $this->permissionship;
    }

    public function getPartialCaveatInfo(): ?array
    {
        return $this->partialCaveatInfo;
    }

    public function setCheckedAt(?ZedToken $checkedAt): self
    {
        $this->checkedAt = $checkedAt;
        return $this;
    }

    public function setPermissionship(?string $permissionship): self
    {
        $this->permissionship = $permissionship;
        return $this;
    }

    public function setPartialCaveatInfo(?array $partialCaveatInfo): self
    {
        $this->partialCaveatInfo = $partialCaveatInfo;
        return $this;
    }
}
