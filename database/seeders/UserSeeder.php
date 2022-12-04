<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            // create role
            $general = Role::create(['name' => 'general-public']);
            $management = Role::create(['name' => 'management']);
            $investigator = Role::create(['name' => 'investigator']);
            $technical = Role::create(['name' => 'technical']);

            // create permission
            $create_report = Permission::create(['name' => 'create-report']);
            $tracking_report = Permission::create(['name' => 'tracking-report']);
            $dashboard = Permission::create(['name' => 'dashboard']);
            $change_report_status = Permission::create(['name' => 'change-report-status']);

            // attach permission to role
            $general->givePermissionTo($create_report);
            $general->givePermissionTo($tracking_report);
            $management->givePermissionTo($dashboard);
            $investigator->givePermissionTo($dashboard);
            $investigator->givePermissionTo($change_report_status);

            // create user
            User::insert([
                [
                    'username' => 'user',
                    'password' => Hash::make('user123'),
                    'role' => 1, // for general
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'username' => 'management',
                    'password' => Hash::make('management'),
                    'role' => 2, // for management
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'username' => 'investigator',
                    'password' => Hash::make('investigator'),
                    'role' => 3, // for investigator
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ]);

            // assign user to role
            $users = User::all();
            foreach($users as $user) {
                $role = Role::findById($user->role);
                $user->assignRole($role);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        
    }
}
