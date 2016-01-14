<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UsersTableSeeder::class);
        // $this->call(CampaignDataTableSeeder::class);
        // $this->call(CampaignDataV2TableSeeder::class);
        // $this->call(CampaignDataV3TableSeeder::class);

        //NEW DB STRUCTURE
        // $this->call(CampaignDataV4TableSeeder::class);
        $this->call(CampaignDataV5TableSeeder::class);
        $this->call(CampaignDataV6TableSeeder::class);

        Model::reguard();
    }
}
