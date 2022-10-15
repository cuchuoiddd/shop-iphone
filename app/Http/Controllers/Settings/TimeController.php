<?php

namespace App\Http\Controllers\Settings;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Okr;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $docs = Time::where('company_code',$user->company_code)->when(isset($request->name),function ($q) use ($request){
            $q->where('name','like','%'.$request->name.'%');
        })->orderByDESC('id')->get();
        if($request->ajax()){
            return view('settings.time.ajax',compact('docs'));
        }
        return view('settings.time.index',compact('docs'));
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
        $data = $request->except('_token');
        $data['company_code'] = $user->company_code;
        $data['start_date'] = Functions::yearMonthDay($request->start_date);
        $data['end_date'] = Functions::yearMonthDay($request->end_date);
        Time::create($data);
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
        $data = $request->except('_token');
        $data['start_date'] = Functions::yearMonthDay($request->start_date);
        $data['end_date'] = Functions::yearMonthDay($request->end_date);
        Time::find($id)->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $okr = Okr::where('time_id',$id)->first();
        if($okr){
            $data['success'] = false;
            $data['message'] = 'Tồn tại okrs không được xoá !';
            return $data;
        } else {
            Time::find($id)->delete();
            return 1;
        }
    }
}
