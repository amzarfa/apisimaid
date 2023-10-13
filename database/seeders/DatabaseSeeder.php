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
        $this->call(KodeUnitAuditSeeder::class);
        $this->call(KodeSubUnitAuditSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(KodePeranSeeder::class);
        $this->call(KodeProvinsiSeeder::class);
        $this->call(KodeKabupatenKotaSeeder::class);
        $this->call(KodeKecamatanSeeder::class);
        $this->call(KodeKelurahanSeeder::class);
        $this->call(KodeJenisAnggaranSeeder::class);
        $this->call(KodeJenisObrikSeeder::class);
        $this->call(KodeGrupLingkupAuditSeeder::class);
        $this->call(KodeLingkupAuditSeeder::class);
        $this->call(KodeUnitObrikSeeder::class);
        $this->call(KodeBidangObrikSeeder::class);
        $this->call(KodeSubBidangObrikSeeder::class);
    }
}
