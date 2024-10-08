<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 5; $i++) { 
            DB::table('organizers')->insert([
                'name' => fake()->company(),
                'description' => fake()->text(),
                'facebook_link' => 'http://m.facebook.com/dummy',
                'x_link' => 'http://x.com/dummy',
                'website_link' => 'http://dummy.com',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],);
        }
    }
}
