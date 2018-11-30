<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $data = array(
            [   
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'pwd' => '1234',
                'password' => Hash::make('1234'),
                'nivel_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [   
                'name' => 'Usuário Default',
                'email' => 'libras@libras.com',
                'pwd' => '1234',
                'password' => Hash::make('1234'),
                'nivel_id' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime() 
            ]
        );
        DB::table('users')->insert($data);
    }
}
