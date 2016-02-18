<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Create a super administrator
         */
        User::create([
            'name'      => 'Super Administrator',
            'email'     => 'suadmin@suadmin.com',
            'password'  => 'suadmin'
        ]);

        /**
         * Create administrator
         */
        User::create([
            'name'      => 'Administrator',
            'email'     => 'admin@admin.com',
            'password'  => 'admin'
        ]);
    }
}
