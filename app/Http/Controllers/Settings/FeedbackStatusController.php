<?php

namespace App\Http\Controllers\Settings;

use App\Constants\SettingConstant;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\FeedbackStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $docs = FeedbackStatus::where('company_code',$user->company_code)->when(isset($request->name),function ($q) use ($request){
            $q->where('name','like','%'.$request->name.'%');
        })->when(isset($request->type),function ($q) use ($request){
            $q->where('type',$request->type);
        })->when(isset($request->department_id),function ($q) use ($request){
            $q->where('department_id',$request->department_id);
        })->orderBy('position')->paginate(SettingConstant::DEFAULT_PAGINATE);

        $departments = Department::where('company_code',$user->company_code)->get();
        if($request->ajax()){
            return view('settings.feedback_status.ajax',compact('docs'));
        }
        return view('settings.feedback_status.index',compact('docs','departments'));
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
        FeedbackStatus::create($data);
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
        FeedbackStatus::find($id)->update($request->all());
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
        //
    }
}
