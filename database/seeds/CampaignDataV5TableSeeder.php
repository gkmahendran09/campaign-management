<?php

use Illuminate\Database\Seeder;

class CampaignDataV5TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for( $i = 20000; $i < 40000; $i++ ) {
        $campaign_data = array(
          array(
            'form_id'      => 1,
            'field_id'   => 1,
            'field_value' => $faker->name,
            'row_id' => $i
            ),
          array(
            'form_id'      => 1,
            'field_id'   => 2,
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => $i
            ),
          array(
            'form_id'      => 1,
            'field_id'   => 3,
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => $i
            )
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
