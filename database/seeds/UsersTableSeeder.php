<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the users table
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->delete();

        if (env('APP_ENV') === 'local')
        {
            // generate 3 users/author
            $faker = \Faker\Factory::create();

            DB::table('users')->insert([
                [
                    'name' => "John Doe",
                    'slug' => 'john-doe',
                    'email' => "johndoe@test.com",
                    'password' => bcrypt('secret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Jane Doe",
                    'slug' => 'jane-doe',
                    'email' => "janedoe@test.com",
                    'password' => bcrypt('secret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Edo Masaru",
                    'slug' => 'edo-masaru',
                    'email' => "edo@test.com",
                    'password' => bcrypt('secret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
            ]);
        }
        else
        {
            DB::table('users')->insert([
                [
                    'name' => "Administrator",
                    'slug' => 'admin',
                    'email' => "admin@test.com",
                    'password' => bcrypt('admin'),
                    'bio' => "I'm an Administrator"
                ]
            ]);
        }
    }
}
