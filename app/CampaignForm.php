<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignForm extends Model
{
  protected $table = 'campaign_forms';

  protected $fillable = ['campaign_id', 'form_title'];

  protected $primaryKey = 'form_id';

  public function fields()
  {
    // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    return $this->hasMany('App\CampaignField', 'form_id', 'form_id');
  }

  public function campaign()
  {
    // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    return $this->belongsTo('App\CampaignMaster', 'campaign_id', 'campaign_id');
  }

}
