<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') === 'local')
        {
            $this->call(UsersTableSeeder::class);
            $this->call(PostsTableSeeder::class);
            $this->call(CategoriesTableSeeder::class);
            $this->call(RolesTableSeeder::class);
            $this->call(PermissionsTableSeeder::class);
            $this->call(TagsTableSeeder::class);
            $this->call(CommentsTableSeeder::class);
        }
        else
        {
            $this->call(UsersTableSeeder::class);
            $this->call(CategoriesTableSeeder::class);
            $this->call(RolesTableSeeder::class);
            $this->call(PermissionsTableSeeder::class);
        }
    }
}
