<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use DB;
use Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing users
        //DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('contacts')->truncate();
        DB::table('categories')->truncate();
        DB::table('categorys_posts')->truncate();
        DB::table('contact_information')->truncate();
        DB::table('countries')->truncate();
        DB::table('states')->truncate();
        DB::table('cities')->truncate();
        DB::table('images')->truncate();
        DB::table('videos')->truncate();
        DB::table('tags')->truncate();
        DB::table('taggables')->truncate();

        $faker = Faker::create();

        // Insert dummy data
        // foreach (range(1, 50) as $index) {
        //     DB::table('users')->insert([
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'password' => Hash::make('password123'),
        //     ]);
        // }

        // Insert dummy data
        foreach (range(1, 100) as $index) {
            DB::table('posts')->insert([
                'title' => $faker->name,
                'description' => $faker->address,
                'user_id' => \App\Models\User::all()->random()->id,
            ]);
        }
        // Insert dummy data
        foreach (range(1, 100) as $index) {
            DB::table('contacts')->insert([
                'address' => $faker->address,
                'phone_no' => $faker->phoneNumber,
                'user_id' => \App\Models\User::all()->random()->id,
            ]);
        }
        // Insert dummy data
        foreach (range(1, 100) as $index) {
            DB::table('contact_information')->insert([
                'pincode' => $faker->phoneNumber,
                'tel_no' => $faker->phoneNumber,
                'near_by' => $faker->address,
                'extra_details' => $faker->address,
                'contacts_id' => \App\Models\Contacts::all()->random()->id,
            ]);
        }
        // Insert dummy data
        foreach (range(1, 100) as $index) {
            DB::table('categories')->insert([
                'name' => $faker->title,
            ]);
        }
        // Insert dummy data
        foreach (range(1, 100) as $index) {
            DB::table('categorys_posts')->insert([
                'category_id' => \App\Models\Categorys::all()->random()->id,
                'post_id' => \App\Models\Posts::all()->random()->id,
            ]);
        }
        // Insert dummy data
        foreach (range(1, 100) as $index) {
            DB::table('countries')->insert([
                'name' => $faker->word,
            ]);
        }
        // Insert dummy data
        foreach (range(1, 100) as $index) {
            DB::table('states')->insert([
                'name' => $faker->word,
                'country_id' => \App\Models\country::all()->random()->id,
            ]);
        }
        // Insert dummy data
        foreach (range(1, 100) as $index) {
            DB::table('cities')->insert([
                'name' => $faker->word,
                'state_id' => \App\Models\state::all()->random()->id,
            ]);
        }
        // Insert dummy data
        $noteable = [\App\Models\User::class, \App\Models\Posts::class];

        foreach (range(1, 100) as $index) {
            DB::table('images')->insert([
                'url' => $faker->imageUrl($width = 640, $height = 480),
                'imageable_id' => $faker->numberBetween(1, 10),
                'imageable_type' => $faker->randomElement($noteable),
            ]);
        }

        // Insert dummy data
        foreach (range(1, 100) as $index) {
            DB::table('videos')->insert([
                'name' => $faker->word,
            ]);
        }
        // Insert dummy data
        foreach (range(1, 100) as $index) {
            DB::table('tags')->insert([
                'name' => $faker->word,
            ]);
        }
        // Insert dummy data
        $noteable = [\App\Models\Video::class, \App\Models\Posts::class];

        foreach (range(1, 100) as $index) {
            DB::table('taggables')->insert([
                'tag_id' => \App\Models\Tag::all()->random()->id,
                'taggable_id' => $faker->numberBetween(1, 100),
                'taggable_type' => $faker->randomElement($noteable),
            ]);
        }
    }
}
