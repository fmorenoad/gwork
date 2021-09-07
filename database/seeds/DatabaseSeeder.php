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
        
        /* factory(App\Resource::class, 10000)->create();
        factory(App\Work::class, 50)->create();
        factory(App\Cost::class, 500)->create();
        factory(App\Refwork::class, 50)->create();
        factory(App\Refresource::class, 200)->create(); */

        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        
    }
}
