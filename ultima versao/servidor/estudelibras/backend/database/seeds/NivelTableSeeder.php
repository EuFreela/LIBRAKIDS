<?php

use Illuminate\Database\Seeder;

class NivelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nivel')->delete();
        $data = array(
            [        
                'code' => 1,        
                'name' => 'Admin',
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'code' => 2,
                'name' => 'Usuário',
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ]
        );
        DB::table('nivel')->insert($data);
    }
}
