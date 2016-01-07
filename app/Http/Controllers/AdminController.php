<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuildFormRequest;
use App\Http\Controllers\Controller;

use DB;

class AdminController extends Controller
{
    public function dashboard() {
      return view('admin.dashboard');
    }

    public function report() {
      // return view('admin.dashboard');
    }

    public function build($campaign_id) {
      $campaign = \App\CampaignMaster::findOrFail($campaign_id);
      $data = [
        'campaign_id' => $campaign_id,
        'campaign_title' => $campaign->campaign_title
      ];
      return view('admin.build')->with('data', $data);
    }

    public function storeBuild($campaign_id, BuildFormRequest $request) {

      //Find Campaign
      $campaign = \App\CampaignMaster::findOrFail($campaign_id);
      $c_id = $campaign->campaign_id;

      //Campaign Form Setup
      $f_title = $request->get('form_name');

      $form = new \App\CampaignForm;
      $form->campaign_id = $campaign->campaign_id;
      $form->form_title = $f_title;


      DB::transaction(function() use ($form, $c_id, $request)
      {
         //Save Form
         $form->save();

         $f_id = $form->form_id;

         $field_name = $request->get('field_name');
         $field_datatype = $request->get('field_datatype');

         for( $i = 0; $i < count($field_name); $i++ )
         {
           //Campaign Form Fields Setup
           $field = new \App\CampaignField;
           $field->campaign_id = $c_id;
           $field->form_id = $f_id;

           $field->field_key = $c_id . '_' . $f_id . '_field_' . $i;

           $field->field_friendly_name = $field_name[$i];
           $field->datatype = $field_datatype[$i];

           //Save Field
           $field->save();

         }

      });

      $url = route('preview_form', ['campaign_id' => $c_id, 'form_id' => $form->form_id]);

      return response()->json(['success' => 'true', 'message' => 'Form Created.', 'previewURL' => $url], 200);
    }
}
