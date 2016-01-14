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
        // $this->call(CampaignDataV5TableSeeder::class);
        // $this->call(CampaignDataV6TableSeeder::class);

        // $this->call(CampaignDataV7TableSeeder::class);
        // $this->call(CampaignDataV8TableSeeder::class);
        // $this->call(CampaignDataV9TableSeeder::class);

        // $this->call(CampaignDataV10TableSeeder::class);
        // $this->call(CampaignDataV11TableSeeder::class);
        // $this->call(CampaignDataV12TableSeeder::class);

        $this->call(CampaignDataV13TableSeeder::class);
        $this->call(CampaignDataV14TableSeeder::class);
        $this->call(CampaignDataV15TableSeeder::class);

        Model::reguard();
    }
}
