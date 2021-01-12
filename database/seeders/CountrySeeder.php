<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $collection = collect(['country1','country2','country3','country4','country5']);
        $collection->each(function ($item, $key) {
            DB::table('countries')->insert([
                'name' => $item
            ]);
        });

    }
}
