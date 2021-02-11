<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $agents = collect(['Agent1','Agent2','Agent3','Agent4','Agent5']);
        $agents->each(function ($agent, $key) {
            DB::table('users')->insert([
                'name' => $agent,
                'email' => $agent,
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
            ]);
        });
    }
}
