<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Validator;
use DB;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if (Auth::check()) {

          if ($request->ajax())
          {
                $campaign = new \App\CampaignMaster;
                return response()->json(['success' => 'true', 'message' => $campaign->get_all_campaign()], 200);

          }
          else
          {
              return response()->json(['success' => 'false', 'message' => 'Not an Ajax request'], 400);
          }
      }
      else
      {
          // return response()->json(['success' => 'false', 'message' => 'User not logged in'], 400);
          return response()->json(['success' => 'false', 'message' => 'User not logged in']);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      if (Auth::check()) {

          if ($request->ajax())
          {
              $rules = [
                  'campaign_name' => 'required|unique:campaign_master,campaign_title'
              ];

              $messages = [
                  'campaign_name.required' => 'Campaign Name is required',
                  'campaign_name.unique' => 'Campaign Name has already been taken.'
              ];

              $validation = Validator::make($request->only('campaign_name'), $rules, $messages);

              if ($validation->fails()) {
                return response()->json(['success' => 'false', 'errors' => $validation->errors()], 400);
              } else {

                $c_title = $request->get('campaign_name');
                $campaign = new \App\CampaignMaster;
                $campaign->campaign_title = $c_title;                

                DB::transaction(function() use ($campaign)
                {
                   $campaign->save();
                });

                $url = route('build', ['campaign_id' => $campaign->campaign_id]);


                return response()->json(['success' => 'true', 'redirect' => $url], 200);
              }

          }
          else
          {
              return response()->json(['success' => 'false', 'message' => 'Not an Ajax request'], 400);
          }
      }
      else
      {
          return response()->json(['success' => 'false', 'message' => 'User not logged in']);
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
