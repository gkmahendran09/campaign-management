<?php

use Illuminate\Database\Seeder;

class CampaignDataV2TableSeeder extends Seeder
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
            'form_id'      => 3,
            'field_key'   => '1_3_field_0',
            'field_value' => $faker->name,
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_1',
            'field_value' => $faker->companyEmail,
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_2',
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_3',
            'field_value' => $faker->numberBetween(20,100),
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_4',
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_5',
            'field_value' => $faker->userName,
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_6',
            'field_value' => $faker->password,
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_7',
            'field_value' => $faker->domainName,
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_8',
            'field_value' => $faker->userAgent,
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_9',
            'field_value' => $faker->creditCardType,
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_10',
            'field_value' => $faker->creditCardNumber,
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_11',
            'field_value' => $faker->creditCardExpirationDate,
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_12',
            'field_value' => $faker->countryCode,
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_13',
            'field_value' => $faker->languageCode,
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          array(
            'campaign_id'      => 1,
            'form_id'      => 3,
            'field_key'   => '1_3_field_14',
            'field_value' => $faker->currencyCode,
            'row_id' => 'ROW_ID_1_3_'.$i
            ),
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
