<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'=>'admin@admin.com',
            'password'=>Hash::make('admin666'),
            'name'=>'Jose Daniel Morales Ocampo',
            'role'=>2
        ]);
    }
}
