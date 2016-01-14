<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class AlterCampaignDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // Schema::table('campaign_data', function (Blueprint $table) {
      //   $table->dropForeign('campaign_id');
      //   $table->dropForeign('field_key');
      //   $table->dropForeign('form_id');
      //
      //     $table->dropIndex('campaign_id');
      //     $table->dropIndex('form_id');
      //     $table->dropIndex('row_id');
      //     $table->dropIndex('field_value');
      //
      // });
      //
      // DB::table('campaign_data')->truncate();
      Schema::dropIfExists('campaign_data');

      Schema::create('campaign_data', function (Blueprint $table) {
          $table->integer('form_id')->unsigned();
          $table->integer('field_id')->unsigned();
          $table->string('field_value');
          $table->bigInteger('row_id');
          $table->timestamps();
          $table->foreign('form_id')->references('form_id')->on('campaign_forms')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('field_id')->references('field_id')->on('campaign_fields')->onDelete('cascade')->onUpdate('cascade');

          $table->index(['form_id', 'row_id', 'field_id']);
          $table->index(['form_id', 'field_id', 'field_value']);
      });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('campaign_data');
    }
}
