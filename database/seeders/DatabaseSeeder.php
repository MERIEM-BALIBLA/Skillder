<?php

namespace Database\Seeders;
use App\Models\Company;
use App\Models\User;
use illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // insert:query bulder
        // DB::table('users')->insert([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         // Create admin User and assign the role to him.
         $user = User::create([
            'name' => 'Admin',
            // 'role' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'Admin2000'
        ]); 

        $adminRole = Role::create(['name'=>'Admin']);
        $apprenantRole = Role::create(['name'=>'apprenant']);

        $user->assignRole($adminRole);
        
        // Créer ou récupérer les permissions
        $additionalPermissionsAdmin = [
            Permission::firstOrCreate(['name' => 'manage_users']),
            Permission::firstOrCreate(['name' => 'manage_companies']),
            Permission::firstOrCreate(['name' => 'manage_annoucements']),
        ];

        $additionalPermissionsApprenant = [
            Permission::firstOrCreate(['name' => 'Register']),
            Permission::firstOrCreate(['name' => 'Aplly_to_job']),
            Permission::firstOrCreate(['name' => 'view_job_suggestions']),
        ];

        $adminRole->givePermissionTo($additionalPermissionsAdmin);
        $apprenantRole->givePermissionTo($additionalPermissionsApprenant);

    }
}
