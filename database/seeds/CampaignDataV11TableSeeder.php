<?php

use Illuminate\Database\Seeder;

class CampaignDataV11TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for( $i = 170000; $i < 220000; $i++ ) {
        $campaign_data = array(
          array(
            'form_id'      => 8,
            'field_id'   => 49,
            'field_value' => $faker->name,
            'row_id' => $i
            ),
          array(
            'form_id'      => 8,
            'field_id'   => 50,
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => $i
            ),
          array(
            'form_id'      => 8,
            'field_id'   => 51,
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => $i
            )
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
