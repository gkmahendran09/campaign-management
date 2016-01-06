<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

    public function storeBuild($campaign_id, Request $request) {
      $campaign = \App\CampaignMaster::findOrFail($campaign_id);
      return $request->all();
      // $data = [
      //   'campaign_id' => $campaign_id,
      //   'campaign_title' => $campaign->campaign_title
      // ];
      // return view('admin.build')->with('data', $data);
    }
}
