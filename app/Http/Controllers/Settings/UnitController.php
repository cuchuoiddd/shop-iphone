<?php

namespace App\Http\Controllers\Settings;

use App\Constants\SettingConstant;
use App\Http\Controllers\Controller;
use App\Models\Target;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $docs = Unit::where('company_code',$user->company_code)->when(isset($request->name),function ($q) use ($request){
            $q->where('name','like','%'.$request->name.'%');
        })->orderBy('position')->paginate(SettingConstant::DEFAULT_PAGINATE);
        if($request->ajax()){
            return view('settings.unit.ajax',compact('docs'));
        }
        return view('settings.unit.index',compact('docs'));
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
        Unit::create($data);
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
        Unit::find($id)->update($data);
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
        $target = Target::where('unit_id',$id)->first();
        if($target){
            $data['message'] = 'Đơn vị đã sử dụng không được xoá';
            $data['success'] = false;
            return $data;
        }
        Unit::find($id)->delete();
        return 1;
    }
}
