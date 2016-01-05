<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_forms', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('form_id');
            $table->integer('campaign_id')->unsigned();
            $table->string('form_title');
            $table->timestamps();
            $table->foreign('campaign_id')->references('campaign_id')->on('campaign_master')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_forms');
    }
}
