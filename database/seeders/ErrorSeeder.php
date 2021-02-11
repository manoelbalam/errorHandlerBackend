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
        $errors = collect([  'Wrong Person',
                             'Undefinied Call',
                             'Ghost Call',
                             'No Answer',
                             'Voice Mail',
                             'Choppy Agent Side',
                             'Choppy Client Side',
                             'Choppy Both Sides',
                            ]);
        $errors->each(function ($error) {
            DB::table('errors')->insert([
                'name' => $error
            ]);
        });
        
    }
}
