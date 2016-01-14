<?php

use Illuminate\Database\Seeder;

class CampaignDataV4TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for( $i = 0; $i < 20000; $i++ ) {
        $campaign_data = array(
          array(
            'form_id'      => 4,
            'field_id'   => 21,
            'field_value' => $faker->name,
            'row_id' => $i
            ),
          array(
            'form_id'      => 4,
            'field_key'   => 22,
            'field_value' => $faker->companyEmail,
            'row_id' => $i
            ),
          array(
            'form_id'      => 4,
            'field_key'   => 23,
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => $i
            ),
          array(
            'form_id'      => 4,
            'field_key'   => 24,
            'field_value' => $faker->numberBetween(20,80),
            'row_id' => $i
            ),
          array(
            'form_id'      => 4,
            'field_key'   => 25,
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => $i
            )
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
