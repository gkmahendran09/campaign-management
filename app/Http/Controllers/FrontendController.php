<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function preview_form($campaign_id, $form_id, $raw = 1)
  {

    $campaign = \App\CampaignMaster::findOrFail($campaign_id);
    $form = $campaign->forms()->where('form_id', $form_id)->firstOrFail();
    $fields = $form->fields()->get(['field_key', 'field_friendly_name', 'datatype']);


    $campaign_name = $campaign->campaign_title;
    $form_name = $form->form_title;

    $data = [
      'campaign_id' => $campaign_id,
      'campaign_name' => $campaign_name,
      'form_id' => $form_id,
      'form_name' => $form_name,
      'fields' => $fields
    ];

    if($raw) {
      $returnHTML = view('preview_form')->with('data', $data)->render();
      return response()->json(array('success' => true, 'html'=>$returnHTML));
    } else {
      return view('preview_form')->with('data', $data);
    }

  }

  public function store_form_data(StoreFormRequest $request)
  {
    return response()->json(['success' => 'true', 'message' => 'Good Request.'], 200);
  }
}
