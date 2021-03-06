<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Models\Role;
use App\Models\Permission;

class RoleAndPermissionTableSeeder extends Seeder
{
    /*
    |--------------------------------------------------------------------------
    | Jupiter Roles Table Seeder.
    |--------------------------------------------------------------------------
    |
    | We highly recommend to don't edit any of those parameters.
    | instead use the PermissionTableSeeder do define custom permissions.
    |
    */
    public function run()
    {
        /**
        | The Super Admin Role.
         */
        $superAdminRole = Role::create([
            'name' => 'super_admin',
            'label' => 'Super Administrator',
            'visible' => false,
        ]);

        /**
        | The Can Access Dashboard Role.
        | Can access to the dashboard.
         */
        $dashboardRole = Role::create([
            'name'      => 'dashboard',
            'label'     => 'Dashboard',
        ]);

        /**
        | The Manage Roles Role.
        | Can manage and handle the Roles.
         */
        $manageRoles = Role::create([
            'name' => 'manage_roles',
            'label' => 'Manage Roles',
        ]);
        /**
        | The Manage Users Role.
        | Can manage and handle the Users.
         */

        $manageUsers = Role::create([
            'name' => 'manage_users',
            'label' => 'Manage Users',
        ]);

        /**
        | The File Browser Role.
        | Can upload and manage files.
         */
        $fileBrowser = Role::create([
            'name' => 'file-browser',
            'label' => 'File Browser'
        ]);

        /**
        | Permission to be assigned to the Manage Role Role.
         */
        $canAccessDashboardPermission = Permission::create([
            'name' => 'dashboard',
            'label' => 'Dashboard'
        ]);


        /**
        | Permission to be assigned to the Manage Role Role.
         */
        $readRole = Permission::create([
            'name' => 'read_roles',
            'label' => 'Read roles'
        ]);
        $createRole = Permission::create([
            'name' => 'create_roles',
            'label' => 'Create roles'
        ]);
        $updateRole = Permission::create([
            'name' => 'update_roles',
            'label' => 'Update roles'
        ]);
        $deleteRole = Permission::create([
            'name' => 'delete_roles',
            'label' => 'Delete roles'
        ]);

        /**
        | Permission to be assigned to the Manager Permissions Role.
         */
        $readPermission = Permission::create([
            'name' => 'read_permissions',
            'label' => 'Read permissions',
            'visible' => false,
        ]);
        $createPermission = Permission::create([
            'name' => 'create_permissions',
            'label' => 'Create permissions',
            'visible' => false,
        ]);
        $updatePermission = Permission::create([
            'name' => 'update_permissions',
            'label' => 'Update permissions',
            'visible' => false,
        ]);
        $deletePermission = Permission::create([
            'name' => 'delete_permissions',
            'label' => 'Delete permissions',
            'visible' => false,
        ]);

        /**
        | Permission to be assigned to the Manage Users Role.
         */
        $readUsers = Permission::create([
            'name' => 'read_users',
            'label' => 'Read users',
        ]);
        $createUsers = Permission::create([
            'name' => 'create_users',
            'label' => 'Create users',
        ]);
        $updateUsers = Permission::create([
            'name' => 'update_users',
            'label' => 'Update users',
        ]);
        $deleteUsers = Permission::create([
            'name' => 'delete_users',
            'label' => 'Delete users',
        ]);

        /**
        | Permission to be assigned to the Manage Files Role.
         */
        $readFile = Permission::create([
            'name' => 'read_files',
            'label' => 'Read files'
        ]);
        $uploadFile = Permission::create([
            'name' => 'upload_files',
            'label' => 'Upload files'
        ]);
        $updateFile = Permission::create([
            'name' => 'update_files',
            'label' => 'Update files'
        ]);
        $deleteFile = Permission::create([
            'name' => 'delete_files',
            'label' => 'Delete files'
        ]);


        /**
        | Give Permission to Super Admin Role
         */
        $superAdminRole->givePermissionTo($canAccessDashboardPermission);
        $superAdminRole->givePermissionTo($readPermission);
        $superAdminRole->givePermissionTo($createPermission);
        $superAdminRole->givePermissionTo($updatePermission);
        $superAdminRole->givePermissionTo($deletePermission);
        $superAdminRole->givePermissionTo($readRole);
        $superAdminRole->givePermissionTo($createRole);
        $superAdminRole->givePermissionTo($updateRole);
        $superAdminRole->givePermissionTo($deleteRole);
        $superAdminRole->givePermissionTo($readUsers);
        $superAdminRole->givePermissionTo($createUsers);
        $superAdminRole->givePermissionTo($updateUsers);
        $superAdminRole->givePermissionTo($deleteUsers);
        $superAdminRole->givePermissionTo($readFile);
        $superAdminRole->givePermissionTo($uploadFile);
        $superAdminRole->givePermissionTo($updateFile);
        $superAdminRole->givePermissionTo($deleteFile);


        // Give Permissions to Roles
        // Dashboard
        $dashboardRole->givePermissionTo($canAccessDashboardPermission);

        // Give Permissions to Roles
        // Roles
        $manageRoles->givePermissionTo($readRole);
        $manageRoles->givePermissionTo($createRole);
        $manageRoles->givePermissionTo($updateRole);
        $manageRoles->givePermissionTo($deleteRole);

        // Give Permissions to Roles
        // Users
        $manageUsers->givePermissionTo($readUsers);
        $manageUsers->givePermissionTo($createUsers);
        $manageUsers->givePermissionTo($updateUsers);
        $manageUsers->givePermissionTo($deleteUsers);

        // Give Permissions to Roles
        // Files
        $fileBrowser->givePermissionTo($readFile);
        $fileBrowser->givePermissionTo($uploadFile);
        $fileBrowser->givePermissionTo($updateFile);
        $fileBrowser->givePermissionTo($deleteFile);

        /**
        | Super Admin, is the User with the ID 1
        | Assign Roles to User.
         */
        $userSuperAdmin = User::find(1);
        $userSuperAdmin->assignRole($superAdminRole);

        $userAdmin = User::find(2);
        $userAdmin->assignRole($manageRoles);
        $userAdmin->assignRole($manageUsers);
        $userAdmin->assignRole($fileBrowser);
        $userAdmin->assignRole($dashboardRole);
    }
}
