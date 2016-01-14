<?php

use Illuminate\Database\Seeder;

class CampaignDataV14TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for( $i = 370000; $i < 470000; $i++ ) {
        $campaign_data = array(
          array(
            'form_id'      => 11,
            'field_id'   => 72,
            'field_value' => $faker->name,
            'row_id' => $i
            ),
          array(
            'form_id'      => 11,
            'field_id'   => 73,
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => $i
            ),
          array(
            'form_id'      => 11,
            'field_id'   => 74,
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => $i
            )
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
