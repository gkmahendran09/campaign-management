<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignMaster extends Model
{
  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'campaign_master';

  protected $fillable = ['campaign_title'];

  protected $primaryKey = 'campaign_id';

  public function get_all_campaign() {
    return $this->select(array('campaign_id', 'campaign_title'))->get();
  }
}
