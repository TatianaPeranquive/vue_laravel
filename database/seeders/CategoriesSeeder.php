<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin_@example.com',
            'password'=> Hash::make('admin')
        ]);
        
       $editor = User::factory()->create([
            'name' => 'editor',
            'email' => 'test_@example.com',
            'password'=> Hash::make('editor')
        ]);

        //Asignar roles gracias a la libreria HasRoles que se agrega al modelo de USer--
        $admin->assignRole('admin');
        $editor->assignRole('editor');
    }
}
