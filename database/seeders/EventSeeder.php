<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            'title' => 'Indonesia Innovation Challenge 2024 Powered by Launch Pad',
            'venue' => 'Jatim Expo',
            'date' => Carbon::create(2024, 10, 23)->format('Y-m-d'),
            'start_time' => Carbon::createFromTime(9, 0, 0)->format('H:i:s'),
            'description' => fake()->text(),
            'booking_url' => 'https://www.indonesiaexpo.com/booking',
            'tags' => json_encode(['Surabaya Science & Tech Events', 'Innovation Challenge', 'tag3']), // Example JSON data
            'organizer_id' => 1,
            'event_category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],);
        DB::table('events')->insert([
            'title' => 'Kids Education Expo 2024',
            'venue' => 'The Westin',
            'date' => Carbon::create(2024, 10, 21)->format('Y-m-d'),
            'start_time' => Carbon::createFromTime(9, 0, second: 0)->format('H:i:s'),
            'description' => fake()->text(),
            'tags' => json_encode(['tag1', 'tag2', 'tag3']), // Example JSON data
            'organizer_id' => 2,
            'event_category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],);
        DB::table('events')->insert([
            'title' => 'Surabaya Great Expo 2024',
            'venue' => 'Grand City Surabaya',
            'date' => Carbon::create(2024, 10, 16)->format('Y-m-d'),
            'start_time' => Carbon::createFromTime(8, 0, second: 0)->format('H:i:s'),
            'description' => fake()->text(),
            'tags' => json_encode(['tag1', 'tag2', 'tag3']), // Example JSON data
            'organizer_id' => 3,
            'event_category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],);
        DB::table('events')->insert([
            'title' => 'SMEX(Surabaya Music, Multimedia, and Lighting Expo 2024)',
            'venue' => 'Grand City Surabaya',
            'date' => Carbon::create(2024, 9, 29)->format('Y-m-d'),
            'start_time' => Carbon::createFromTime(8, 0, second: 0)->format('H:i:s'),
            'description' => fake()->text(),
            'tags' => json_encode(['tag1', 'tag2', 'tag3']), // Example JSON data
            'organizer_id' => 4,
            'event_category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],);
        DB::table('events')->insert([
            'title' => 'Japan Edu Expo 2024',
            'venue' => 'Hotel Said',
            'date' => Carbon::create(2024, 9, 22)->format('Y-m-d'),
            'start_time' => Carbon::createFromTime(8, 0, second: 0)->format('H:i:s'),
            'description' => fake()->text(),
            'tags' => json_encode(['tag1', 'tag2', 'tag3']), // Example JSON data
            'organizer_id' => 5,
            'event_category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],);
        DB::table('events')->insert([
            'title' => 'Surabaya Hospital Expo 2024',
            'venue' => 'Grand City, Surabaya',
            'date' => Carbon::create(2024, 10, 7)->format('Y-m-d'),
            'start_time' => Carbon::createFromTime(12, 0, second: 0)->format('H:i:s'),
            'description' => fake()->text(),
            'tags' => json_encode(['tag1', 'tag2', 'tag3']), // Example JSON data
            'organizer_id' => 1,
            'event_category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],);
    }
}
