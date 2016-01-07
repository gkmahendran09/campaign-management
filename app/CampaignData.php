<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignData extends Model
{
  protected $table = 'campaign_data';

  protected $fillable = ['campaign_id', 'form_id', 'field_key', 'field_value', 'row_id'];

  protected $primaryKey = 'data_id';

  public function field()
  {
    // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    return $this->belongsTo('App\CampaignField', 'field_key', 'field_key');
  }
}
