<?php

namespace App\Http\Controllers\Admins;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::first();
        return view('admin.setting.index',compact('settings'));
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
        $rules = array('file' => 'max:10000|mimes:jpg,jpeg,png,JPG,JPEG,PNG');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->with(['type' => 'alert-warning', 'message' => 'Ảnh quá 10mb']);;
        }
        $data = $request->except('file');

        if ($request->file) {
            $destinationPath = '/images/logo/';
            $data['logo'] = Functions::uploadImage($request->file,$destinationPath);
        }

        Setting::create($data);
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
        $rules = array('file' => 'max:10000|mimes:jpg,jpeg,png,JPG,JPEG,PNG');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $data = $request->except('file');
        $setting = Setting::find($id);

        if ($request->file) {
            $destinationPath = '/images/logo/';
            $data['logo'] = Functions::uploadImage($request->file,$destinationPath);
            Functions::unlinkUpload($setting->logo);
        }

        $setting->update($request->all());
        return back()->with(['type' => 'alert-success', 'message' => 'Cập nhật thành công !']);
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
    public function changePassword(){
        $user = Auth::user();
        return view('admin.setting.profile',compact('user'));
    }
    public function updatePassword(Request $request){
        $user = Auth::user();
        if (Hash::check($request->old_password, $user->password)) {
            $password = bcrypt($request->new_password);
            $user->update(['password'=>$password]);
        } else {
            return back()->with(['type' => 'alert-danger', 'message' => 'Mật khẩu hiện tại không đúng']);
        }
        return back()->with(['type' => 'alert-success', 'message' => 'Đổi mk thành công']);
    }
}
