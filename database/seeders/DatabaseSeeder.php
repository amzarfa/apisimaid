<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersPeranSeeder::class);
        $this->call(KodePeranSeeder::class);
        $this->call(KodeProvinsiSeeder::class);
        $this->call(KodeKabupatenKotaSeeder::class);
    }
}
