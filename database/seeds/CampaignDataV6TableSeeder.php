<?php

use Illuminate\Database\Seeder;

class CampaignDataV6TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for( $i = 40000; $i < 60000; $i++ ) {
        $campaign_data = array(
          array(
            'form_id'      => 3,
            'field_id'   => 6,
            'field_value' => $faker->name,
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 7,
            'field_value' => $faker->companyEmail,
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 8,
            'field_value' => $faker->numberBetween(7777777777,9999999999),
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 9,
            'field_value' => $faker->numberBetween(20,100),
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 10,
            'field_value' => $faker->date($format = 'd/m/Y', $max = 'now'),
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 11,
            'field_value' => $faker->userName,
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 12,
            'field_value' => $faker->password,
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 13,
            'field_value' => $faker->domainName,
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 14,
            'field_value' => $faker->userAgent,
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 15,
            'field_value' => $faker->creditCardType,
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 16,
            'field_value' => $faker->creditCardNumber,
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 17,
            'field_value' => $faker->creditCardExpirationDate,
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 18,
            'field_value' => $faker->countryCode,
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 19,
            'field_value' => $faker->languageCode,
            'row_id' => $i
            ),
          array(
            'form_id'      => 3,
            'field_id'   => 20,
            'field_value' => $faker->currencyCode,
            'row_id' => $i
            ),
          );

          DB::table('campaign_data')->insert( $campaign_data );
      }
    }
}
