<?php

use Illuminate\Database\Seeder;

class CampaignDataV15TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for( $i = 470000; $i < 570000; $i++ ) {
        $campaign_data = array(
          array(
            'form_id'      => 13,
            'field_id'   => 80,
            'field_value' => $faker->name,
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 81,
            'field_value' => $faker->companyEmail,
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 82,
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 83,
            'field_value' => $faker->numberBetween(20,100),
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 84,
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 85,
            'field_value' => $faker->userName,
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 86,
            'field_value' => $faker->password,
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 87,
            'field_value' => $faker->domainName,
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 88,
            'field_value' => $faker->userAgent,
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 89,
            'field_value' => $faker->creditCardType,
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 90,
            'field_value' => $faker->creditCardNumber,
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 91,
            'field_value' => $faker->creditCardExpirationDate,
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 92,
            'field_value' => $faker->countryCode,
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 93,
            'field_value' => $faker->languageCode,
            'row_id' => $i
            ),
          array(
            'form_id'      => 13,
            'field_id'   => 94,
            'field_value' => $faker->currencyCode,
            'row_id' => $i
            ),
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
