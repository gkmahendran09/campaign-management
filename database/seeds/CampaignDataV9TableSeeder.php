<?php

use Illuminate\Database\Seeder;

class CampaignDataV9TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for( $i = 100000; $i < 120000; $i++ ) {
        $campaign_data = array(
          array(
            'form_id'      => 6,
            'field_id'   => 29,
            'field_value' => $faker->name,
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 30,
            'field_value' => $faker->companyEmail,
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 31,
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 32,
            'field_value' => $faker->numberBetween(20,100),
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 33,
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 34,
            'field_value' => $faker->userName,
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 35,
            'field_value' => $faker->password,
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 36,
            'field_value' => $faker->domainName,
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 37,
            'field_value' => $faker->userAgent,
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 38,
            'field_value' => $faker->creditCardType,
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 39,
            'field_value' => $faker->creditCardNumber,
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 40,
            'field_value' => $faker->creditCardExpirationDate,
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 41,
            'field_value' => $faker->countryCode,
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 42,
            'field_value' => $faker->languageCode,
            'row_id' => $i
            ),
          array(
            'form_id'      => 6,
            'field_id'   => 43,
            'field_value' => $faker->currencyCode,
            'row_id' => $i
            ),
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
