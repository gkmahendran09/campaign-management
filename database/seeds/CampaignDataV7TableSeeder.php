<?php

use Illuminate\Database\Seeder;

class CampaignDataV7TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for( $i = 60000; $i < 80000; $i++ ) {
        $campaign_data = array(
          array(
            'form_id'      => 7,
            'field_id'   => 44,
            'field_value' => $faker->name,
            'row_id' => $i
            ),
          array(
            'form_id'      => 7,
            'field_key'   => 45,
            'field_value' => $faker->companyEmail,
            'row_id' => $i
            ),
          array(
            'form_id'      => 7,
            'field_id'   => 46,
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => $i
            ),
          array(
            'form_id'      => 7,
            'field_id'   => 47,
            'field_value' => $faker->numberBetween(20,80),
            'row_id' => $i
            ),
          array(
            'form_id'      => 7,
            'field_id'   => 48,
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => $i
            )
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
