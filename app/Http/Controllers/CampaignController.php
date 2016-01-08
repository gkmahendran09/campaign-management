<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateCampaignRequest;
use App\Http\Controllers\Controller;

use DB;
use Auth;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
              $campaign = new \App\CampaignMaster;
              return response()->json(['success' => 'true', 'message' => $campaign->get(['campaign_id', 'campaign_title'])], 200);

        }
        else
        {
            return response()->json(['success' => 'false', 'message' => 'Not an Ajax request'], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateCampaignRequest $request)
    {
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
