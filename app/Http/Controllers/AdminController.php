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

    public function manage_forms($campaign_id) {
      $campaign = \App\CampaignMaster::findOrFail($campaign_id);
      $data = [
        'campaign_id' => $campaign_id,
        'campaign_title' => $campaign->campaign_title
      ];
      return view('admin.manage_forms')->with('data', $data);
    }

    public function report() {
      return view('admin.report');
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

         $i = 0;

         foreach($field_name as $key => $val)
         {
           //Campaign Form Fields Setup
           $field = new \App\CampaignField;
           $field->campaign_id = $c_id;
           $field->form_id = $f_id;

           $field->field_key = $c_id . '_' . $f_id . '_field_' . $i;

           $field->field_friendly_name = $field_name[$key];
           $field->datatype = $field_datatype[$key];

           //Save Field
           $field->save();

           $i++;

         }

      });

      $url = route('preview_form', ['campaign_id' => $c_id, 'form_id' => $form->form_id]);

      return response()->json(['success' => 'true', 'message' => 'Form Created.', 'previewURL' => $url], 200);
    }

    public function get_report($campaign_id, $form_id, $field_key = null, $field_value = null)
    {
      $campaign = \App\CampaignMaster::findOrFail($campaign_id);
      $form = $campaign->forms()->where('form_id', $form_id)->firstOrFail();
      $fields = $form->fields()->get(['field_key', 'field_friendly_name', 'datatype']);

      $field_count = count($fields);

      $row_ids = \App\CampaignData::distinct()->select('row_id')
                                              ->where('form_id', $form_id);
      if($field_value !== null) {
        $row_ids = $row_ids->where('field_value', 'like', $field_value.'%');
      }

      $row_ids = $row_ids->get();

      $collection = \App\CampaignData::select('field_id', 'field_value', 'row_id')
                                      ->where('form_id', $form_id)
                                      ->whereIn('row_id', $row_ids->toArray())
                                      ->paginate($field_count * 10);
      $campaign_name = $campaign->campaign_title;
      $form_name = $form->form_title;

      $data = [
        'campaign_id' => $campaign_id,
        'campaign_name' => $campaign_name,
        'form_id' => $form_id,
        'form_name' => $form_name,
        'fields' => $fields,
        'field_count' => $field_count
      ];

      $returnHTML = view('admin.report_generation')->with('data', $data)->with('field_data', $collection)->render();
      return response()->json(array('success' => true, 'html'=>$returnHTML));
    }



    public function delete_form($campaign_id, $form_id)
    {
      $campaign = \App\CampaignMaster::findOrFail($campaign_id);
      $form = $campaign->forms()->where('form_id', $form_id)->firstOrFail();
      $form->delete();

      return response()->json(array('success' => true, 'message'=>"Form Deleted!"));
    }
}
