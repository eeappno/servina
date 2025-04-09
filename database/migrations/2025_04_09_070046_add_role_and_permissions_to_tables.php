<?php

use App\Enums\PermissionType;
use App\Enums\RoleType;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Admin role and all permissions
        $adminRole = Role::firstOrCreate(['name' => RoleType::ADMIN->value]);

        foreach (PermissionType::cases() as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission->value]);
            $adminRole->givePermissionTo($perm);
        }

        // Technician role
        $technicianRole = Role::firstOrCreate(['name' => RoleType::TECHNICIAN->value]);

        $technicianPermissions = [
            PermissionType::MANAGE_WARRANTY->value,
        ];

        foreach ($technicianPermissions as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $technicianRole->givePermissionTo($perm);
        }

        // User role
        $userRole = Role::firstOrCreate(['name' => RoleType::USER->value]);

        $userPermissions = [
            PermissionType::CLAIM_WARRANTY->value,
        ];

        foreach ($userPermissions as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $userRole->givePermissionTo($perm);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optional: rollback logic
        Role::whereIn('name', [
            RoleType::ADMIN->value,
            RoleType::TECHNICIAN->value,
            RoleType::USER->value,
        ])->delete();

        Permission::whereIn('name', array_map(
            fn ($perm) => $perm->value,
            PermissionType::cases()
        ))->delete();
    }
};
