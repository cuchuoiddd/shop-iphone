<?php

namespace App\Http\Controllers\Okrs;

use App\Constants\SettingConstant;
use App\Http\Controllers\Controller;
use App\Models\Cfrs;
use App\Models\FeedbackStatus;
use App\Models\Okr;
use App\Models\Time;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CfrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responseget-okr-child
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::where('company_code', $user->company_code)->where('id', '<>', $user->id)->get();
        $times = Time::where('company_code', $user->company_code)->get();
//        $okrs = Okr::where('company_code', $user->company_code)->where('user_id', '<>', $user->id)->get();
        $okrs = Okr::where('company_code', $user->company_code)->get();
        $feedbacks = FeedbackStatus::where('company_code', $user->company_code)->whereIn('type', [SettingConstant::CHECK_IN, SettingConstant::PHAN_HOI])->get();
        $secognition = FeedbackStatus::where('company_code', $user->company_code)->where('type', SettingConstant::GHI_NHAN)->get();
        return view('okrs.cfrs.index', compact('users', 'times', 'okrs', 'feedbacks', 'secognition'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $star_rate = FeedbackStatus::find($request->feedback_status_id)->rate;
        $data['current_rate'] = $star_rate;
        $data['user_id'] = $user->id;
        $data['company_code'] = $user->company_code;
        $data['feedback_date'] = date('Y-m-d');
        Cfrs::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
