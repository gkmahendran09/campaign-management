<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_fields', function (Blueprint $table) {
            $table->increments('field_id');
            $table->integer('campaign_id')->unsigned();
            $table->integer('form_id')->unsigned();
            $table->string('field_key', 15)->unique();
            $table->string('field_friendly_name');
            $table->string('datatype');
            $table->timestamps();
            $table->foreign('campaign_id')->references('campaign_id')->on('campaign_master')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('form_id')->references('form_id')->on('campaign_forms')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_fields');
    }
}
