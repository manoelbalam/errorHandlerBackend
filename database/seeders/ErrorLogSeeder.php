<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Error;
use App\Models\Country;
use App\Models\ErrorLog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ErrorLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 10; $x++) 
        {
            $leadId = mt_rand(100000, 999999);
            $userId=User::all()->random(1)->first();
            $errorId=Error::all()->random(1)->first();
            $countryId=Country::all()->random(1)->first();
            DB::table('error_logs')->insert([
                'lead_id' => $leadId,
                'user_id' => $userId->id,
                'error_id' => $errorId->id,
                'country_id' => $countryId->id,
            ]);
        }
    }
}