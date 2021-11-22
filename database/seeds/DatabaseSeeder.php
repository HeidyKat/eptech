<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(BusinessTableSeeder::class);
        $this->call(printerTableSeeder::class);

        factory(App\Tag::class, 10)->create();
        factory(App\Category::class, 10)->create();
        factory(App\Subcategory::class, 50)->create();
        factory(App\Product::class, 10)->create();
        factory(App\Client::class, 10)->create();
    }
}
