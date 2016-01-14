<?php

use Illuminate\Database\Seeder;

class CampaignDataV8TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for( $i = 80000; $i < 100000; $i++ ) {
        $campaign_data = array(
          array(
            'form_id'      => 5,
            'field_id'   => 26,
            'field_value' => $faker->name,
            'row_id' => $i
            ),
          array(
            'form_id'      => 5,
            'field_id'   => 27,
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => $i
            ),
          array(
            'form_id'      => 5,
            'field_id'   => 28,
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => $i
            )
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
