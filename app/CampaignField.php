<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignField extends Model
{
  protected $table = 'campaign_fields';

  protected $fillable = ['campaign_id', 'form_id', 'field_key', 'field_friendly_name', 'datatype'];

  protected $primaryKey = 'field_id';

  public function data()
  {
    // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    return $this->hasMany('App\CampaignData', 'field_key', 'field_key');
  }

  public function form()
  {
    // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    return $this->belongsTo('App\CampaignForm', 'form_id', 'form_id');
  }

}
