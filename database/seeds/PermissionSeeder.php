<?php



use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'user_management_access',
            'permission_create',
            'permission_edit',
            'permission_show',
            'permission_delete',
            'permission_access',
            'role_create',
            'role_edit',
            'role_show',
            'role_delete',
            'role_access',
            'user_create',
            'user_edit',
            'user_show',
            'user_delete',
            'user_access',
            'candidat_create',
            'candidat_edit',
            'candidat_show',
            'candidat_delete',
            'candidat_access',
            'Candidature_create',
            'Candidature_edit',
            'Candidature_show',
            'Candidature_PDF_download',
            'Candidature_PDF_view',
            'Candidature_delete',
            'Candidature_access',
            'DocFile_access',
            'DocFile_create',
            'DocFile_show',
            'DocFile_edit',
            'DocFile_delete',
        ];

        foreach ($permissions as $permission)   {
            Permission::create([
                'name' => $permission
            ]);
        }

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        Role::create(['name' => 'Super Admin']);

        $Role = Role::create(['name' => 'User']);

        $userPermissions = [
            'candidat_create',
            'candidat_edit',
            'candidat_show',
            'candidat_delete',
            'candidat_access',
            'Candidature_create',
            'Candidature_edit',
            'Candidature_show',
            'Candidature_delete',
            'Candidature_access',
            'Candidature_PDF_download',
            'Candidature_PDF_view',
            'mesCandidatures',
            'DocFile_access',
            'DocFile_create',
            'DocFile_show',
            'DocFile_edit',
            'DocFile_delete',
        ];

        foreach ($userPermissions as $permission)   {
            $Role->givePermissionTo($permission);
        }
    }
}
