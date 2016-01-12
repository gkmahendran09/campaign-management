<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToFieldvalueInCampaignData extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('campaign_data', function (Blueprint $table) {
        $table->index('field_value');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('campaign_data', function (Blueprint $table) {
      $table->dropIndex('field_value');
    });
  }
}
