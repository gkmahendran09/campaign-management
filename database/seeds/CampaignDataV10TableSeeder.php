<?php

use Illuminate\Database\Seeder;

class CampaignDataV10TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for( $i = 120000; $i < 170000; $i++ ) {
        $campaign_data = array(
          array(
            'form_id'      => 9,
            'field_id'   => 52,
            'field_value' => $faker->name,
            'row_id' => $i
            ),
          array(
            'form_id'      => 9,
            'field_key'   => 53,
            'field_value' => $faker->companyEmail,
            'row_id' => $i
            ),
          array(
            'form_id'      => 9,
            'field_id'   => 54,
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => $i
            ),
          array(
            'form_id'      => 9,
            'field_id'   => 55,
            'field_value' => $faker->numberBetween(20,80),
            'row_id' => $i
            ),
          array(
            'form_id'      => 9,
            'field_id'   => 56,
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => $i
            )
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
