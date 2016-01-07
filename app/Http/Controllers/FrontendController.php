<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function preview_form($campaign_id, $form_id)
  {

    $campaign = \App\CampaignMaster::findOrFail($campaign_id);
    $form = $campaign->forms()->where('form_id', $form_id)->firstOrFail();
    $fields = $form->fields()->get(['field_key', 'field_friendly_name', 'datatype']);


    $campaign_name = $campaign->campaign_title;
    $form_name = $form->form_title;

    $data = [
      'campaign_name' => $campaign_name,
      'form_name' => $form_name,
      'fields' => $fields
    ];

    return view('preview_form')->with('data', $data);
  }
}
