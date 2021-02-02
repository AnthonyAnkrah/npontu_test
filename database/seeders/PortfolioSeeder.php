<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if Portfolio table empty
        // To prevent losing previously inserted data
        if(DB::table('portfolios')->get()->count() == 0){
            // Insert starter Records
            DB::table('portfolios')->insert([
                [
                    'title' => 'Receptionist',
                    'access_level' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Application Support',
                    'access_level' => 2,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Team Leader',
                    'access_level' => 3,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        }else { echo "Table `portfolios` is not empty, therefore NOT executed!"; }
    }
}
