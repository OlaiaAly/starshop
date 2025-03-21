<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Artisan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('migrate:fresh');

        $this->call(UserTableSeeder::class);
        // \App\Models\User::factory(10)->create();
        $this->call(CategorySeeder::class);

        $this->call(ProductSeeder::class);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Rodar os comandos Artisan
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('cache:clear');
        // Artisan::call('config:cache');
        // Você pode adicionar uma mensagem para saber que os comandos foram executados
        echo "\n\n\t Cache, views, rotas e config limpos com sucesso!\n\n";
    }
}
