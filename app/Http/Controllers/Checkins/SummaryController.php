<?php

namespace App\Http\Controllers\Checkins;

use App\Constants\SettingConstant;
use App\Http\Controllers\Controller;
use App\Models\Okr;
use App\Models\Summary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->except('target_id');
        $data['company_code'] = $user->company_code;
        $detail = [];
        $obj = new \stdClass();
        foreach ($request->target_id as $key => $item){
            $obj->target_id = $item;
            $obj->scores = $request->detail_scores[$key];
            $detail[] = $obj;
        }
        $data['detail_scores'] = json_encode($detail);

        Summary::create($data);

        $okr = Okr::find($request->okr_id);
        $okr->update(['status'=>SettingConstant::CHO_PHAN_HOI_lAN_2]);

        return back();
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
