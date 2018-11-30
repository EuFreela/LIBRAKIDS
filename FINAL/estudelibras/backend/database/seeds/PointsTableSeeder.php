<?php

use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('points')->delete();
        $data = array(
            [   
                'score' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'users_id' => 1
            ],
            [   
                'score' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'users_id' => 2
            ]
        );
        DB::table('points')->insert($data);
    }
}
