<?php

namespace App\Http\Controllers\Checkins;

use App\Constants\SettingConstant;
use App\Http\Controllers\Controller;
use App\Models\Feedback2;
use App\Models\Okr;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Feedback2Controller extends Controller
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
        $data = $request->all();
        $data['company_code'] = $user->company_code;
        Feedback2::create($data);

        $okr = Okr::find($request->okr_id);
        $okr->update(['status'=>SettingConstant::DA_TONG_KET]);

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

    public function getUserWithOkr($okr_id){
        $okr = Okr::find($okr_id);
        $user = User::find($okr->user_id);
        return $user;
    }
}
