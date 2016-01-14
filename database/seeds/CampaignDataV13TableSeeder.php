<?php

use Illuminate\Database\Seeder;

class CampaignDataV13TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for( $i = 270000; $i < 370000; $i++ ) {
        $campaign_data = array(
          array(
            'form_id'      => 12,
            'field_id'   => 75,
            'field_value' => $faker->name,
            'row_id' => $i
            ),
          array(
            'form_id'      => 12,
            'field_key'   => 76,
            'field_value' => $faker->companyEmail,
            'row_id' => $i
            ),
          array(
            'form_id'      => 12,
            'field_id'   => 77,
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => $i
            ),
          array(
            'form_id'      => 12,
            'field_id'   => 78,
            'field_value' => $faker->numberBetween(20,80),
            'row_id' => $i
            ),
          array(
            'form_id'      => 12,
            'field_id'   => 79,
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => $i
            )
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
