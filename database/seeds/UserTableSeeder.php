<?php

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create();

        Role::create([

            'name'=>'Admin',
            'slug'=>'admin',
            'special'=>'all-access',

        ]);
    }
}
