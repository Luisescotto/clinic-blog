<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $cashier = Role::create(['name' => 'Cashier']);
        $client = Role::create(['name' => 'Client']);


        $admin_user = User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>'12345678',
        ]);
        $admin_user->profile()->create();
        $admin_user->assignRole('Admin');

        $cashier_user = User::create([
            'name'=>'Cashier',
            'email'=>'cashier@gmail.com',
            'password'=>'$2y$10$DwYnKD4mvcR/rNul3SblLeJZTGrSBiObiEIOokHoBHm4di/mKGBkC',
        ]);
        $cashier_user->profile()->create();
        $cashier_user->assignRole('Cashier');


        $client_user = User::create([
            'name'=>'Client',
            'email'=>'client@gmail.com',
            'password'=>'$2y$10$DwYnKD4mvcR/rNul3SblLeJZTGrSBiObiEIOokHoBHm4di/mKGBkC',
        ]);
        $client_user->profile()->create();
        $client_user->assignRole('Client');
    }
}
