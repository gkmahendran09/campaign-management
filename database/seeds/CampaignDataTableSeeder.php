<?php

use Illuminate\Database\Seeder;

class CampaignDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // DB::table('campaign_data')->delete();

      $faker = Faker\Factory::create();

      for( $i = 0; $i < 20000; $i++ ) {
        $campaign_data = array(
          array(
            'campaign_id'      => 1,
            'form_id'      => 1,
            'field_key'   => '1_1_field_0',
            'field_value' => $faker->name,
            'row_id' => 'ROW_ID_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 1,
            'field_key'   => '1_1_field_1',
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => 'ROW_ID_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 1,
            'field_key'   => '1_1_field_2',
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => 'ROW_ID_'.$i
            )
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
