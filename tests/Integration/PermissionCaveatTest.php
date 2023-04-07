<?php declare(strict_types=1);

namespace LinkORB\Authzed\Tests\Integration;

use LinkORB\Authzed\Dto\ObjectReference;
use LinkORB\Authzed\Dto\PermissionUpdate;
use LinkORB\Authzed\Dto\Request\PermissionCheck as PermissionCheckRequest;
use LinkORB\Authzed\Dto\SubjectReference;
use LinkORB\Authzed\SpiceDB;
use PHPUnit\Framework\TestCase;

class PermissionCaveatTest extends TestCase
{
    use SpicedbClientAwareTrait;

    private ?SpiceDB $client;

    public function setUp(): void
    {
        $this->client = $this->getClient();
    }

    public function testPermissionCheckCaveats(): void
    {
        shell_exec('zed schema write /app/tests/resources/schema --insecure');
        shell_exec('zed relationship create resource:wiki viewer user:emilia --caveat \'my_caveat:{"first_parameter":42}\' --insecure');
        shell_exec('zed relationship create resource:book viewer user:virginia --caveat \'my_caveat:{"first_parameter":1}\' --insecure');

        $checkRequestMissingContextPermission = new PermissionCheckRequest(
            null,
            new ObjectReference('resource', 'wiki'),
            'view',
            new SubjectReference(new ObjectReference('user', 'emilia'))
        );

        // We need to provide missing context for caveat here
        $checkResponseMissingContextPermission = $this->client->checkPermission($checkRequestMissingContextPermission);
        $this->assertEquals(
            PermissionUpdate::PERMISSIONSHIP_CONDITIONAL_PERMISSION,
            $checkResponseMissingContextPermission->getPermissionship()
        );
        $this->assertEquals(
            ['missingRequiredContext' => ['second_parameter']],
            $checkResponseMissingContextPermission->getPartialCaveatInfo()
        );

        $checkRequestHasPermission = new PermissionCheckRequest(
            null,
            new ObjectReference('resource', 'wiki'),
            'view',
            new SubjectReference(new ObjectReference('user', 'emilia')),
            ['second_parameter' => 'hello world']
        );
        $checkResponseHasPermission = $this->client->checkPermission($checkRequestHasPermission);
        $this->assertEquals(
            PermissionUpdate::PERMISSIONSHIP_HAS_PERMISSION,
            $checkResponseHasPermission->getPermissionship()
        );

        // False, as second parameter doesn't match
        $checkRequestNoPermission1 = new PermissionCheckRequest(
            null,
            new ObjectReference('resource', 'wiki'),
            'view',
            new SubjectReference(new ObjectReference('user', 'emilia')),
            ['second_parameter' => 'no idea']
        );
        $checkResponseNoPermission1 = $this->client->checkPermission($checkRequestNoPermission1);
        $this->assertEquals(
            PermissionUpdate::PERMISSIONSHIP_NO_PERMISSION,
            $checkResponseNoPermission1->getPermissionship()
        );

        // False as first parameter (which was specified during relationship write) doesn't match
        $checkRequestNoPermission2 = new PermissionCheckRequest(
            null,
            new ObjectReference('resource', 'book'),
            'view',
            new SubjectReference(new ObjectReference('user', 'virginia')),
            ['second_parameter' => 'hello world']
        );
        $checkResponseNoPermission2 = $this->client->checkPermission($checkRequestNoPermission2);
        $this->assertEquals(
            PermissionUpdate::PERMISSIONSHIP_NO_PERMISSION,
            $checkResponseNoPermission2->getPermissionship()
        );
    }
}
