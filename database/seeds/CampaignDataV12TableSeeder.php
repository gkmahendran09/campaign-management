<?php

use Illuminate\Database\Seeder;

class CampaignDataV12TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for( $i = 220000; $i < 270000; $i++ ) {
        $campaign_data = array(
          array(
            'form_id'      => 10,
            'field_id'   => 57,
            'field_value' => $faker->name,
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 58,
            'field_value' => $faker->companyEmail,
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 59,
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 60,
            'field_value' => $faker->numberBetween(20,100),
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 61,
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 62,
            'field_value' => $faker->userName,
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 63,
            'field_value' => $faker->password,
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 64,
            'field_value' => $faker->domainName,
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 65,
            'field_value' => $faker->userAgent,
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 66,
            'field_value' => $faker->creditCardType,
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 67,
            'field_value' => $faker->creditCardNumber,
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 68,
            'field_value' => $faker->creditCardExpirationDate,
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 69,
            'field_value' => $faker->countryCode,
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 70,
            'field_value' => $faker->languageCode,
            'row_id' => $i
            ),
          array(
            'form_id'      => 10,
            'field_id'   => 71,
            'field_value' => $faker->currencyCode,
            'row_id' => $i
            ),
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
