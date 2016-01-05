<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_data', function (Blueprint $table) {
            $table->increments('data_id');
            $table->integer('campaign_id')->unsigned();
            $table->integer('form_id')->unsigned();
            $table->string('field_key', 15);
            $table->string('field_value');
            $table->bigInteger('row_id');
            $table->timestamps();
            $table->foreign('campaign_id')->references('campaign_id')->on('campaign_master')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('form_id')->references('form_id')->on('campaign_forms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('field_key')->references('field_key')->on('campaign_fields')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_data');
    }
}
