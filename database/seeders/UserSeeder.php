<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Jorge Alberto Perez Sandoval',
            'email' => 'test@test.com',
            'password' => bcrypt ('123456789')
            
        ])->assignRole('Admin');
        
        
        
    }
}
