<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ErrorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect(['error1','error2','error3','error4','error5']);
        $collection->each(function ($item, $key) {
            DB::table('errors')->insert([
                'name' => $item
            ]);
        });
        
    }
}
