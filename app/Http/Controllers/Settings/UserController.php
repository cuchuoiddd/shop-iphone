<?php

namespace App\Http\Controllers\Settings;

use App\Constants\SettingConstant;
use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Office;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $docs = User::where('company_code',$user->company_code)->when(isset($request->name),function ($q) use ($request){
            $q->where('full_name','like','%'.$request->name.'%');
        })->orderByDESC('id')->get();

        $department = Department::where('company_code',$user->company_code)->get();
        $office = Office::where('company_code',$user->company_code)->get();
        if($request->ajax()){
            return view('settings.user.ajax',compact('docs','department','office'));
        }
        return view('settings.user.index',compact('docs','department','office'));
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
        $rules = array('username' => 'unique:users|max:255');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->with(['type'=>'alert-danger','message'=>'Tên đăng nhập đã tồn tại !!!']);
        }

        $user = Auth::user();
        if($request->parent_id){
            $data = $request->except('_token');
        } else {
            $data = $request->except('_token','parent_id');
        }
        $data['company_code'] = $user->company_code;
        $data['password'] = bcrypt(123456);

        User::create($data);
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
        if(!$request->parent_id){
            $data = $request->except('parent_id');
        } else {
            $data = $request->all();
        }
        if($request->status && $request->status == 'on'){
            $data['status'] = 0;
        }else {
            $data['status'] = 1;
        }
        User::find($id)->update($data);
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

    public function updateStatus(Request $request){
        $status = $request->status == "true" ? 1 : 0;
        User::find($request->id)->update(['status'=>$status]);
        $data['success'] = 1;
        $data['status'] = $status;
        return $data;
    }

    public function profile()
    {
        $user = Auth::user();
        $offices = Office::where('company_code',$user->company_code)->get();
        $departments = Department::where('company_code',$user->company_code)->get();
        $users = User::where('company_code',$user->company_code)->where('id','<>',$user->id)->get();
        return view('settings.user.profile',compact('user','offices','departments','users'));
    }

    public function updateProfile(Request $request){

        $user = Auth::user();
        $data = $request->except('file');
        if($request->file){
            $rules = array('file' => 'required|max:10000|mimes:jpg,jpeg,png,JPG,JPEG,PNG');
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            $part = '/images/avatar';
            $data['avatar'] = Functions::uploadImage($request->file,$part);
            if($user->avatar){
                $part_delete = '/images/avatar/'.$user->avatar;
                Functions::unlinkUpload($part_delete);
            }
        }
        $user->update($data);
        return back();
    }

    public function changePassword(){
        $user = Auth::user();
        $change_password = true;
        return view('settings.user.profile',compact('user','change_password'));
    }
    public function updatePassword(Request $request){
        $user = Auth::user();
        if (Hash::check($request->old_password, $user->password)) {
            $password = bcrypt($request->new_password);
            $user->update(['password'=>$password]);
        } else {
            return back()->with(['type' => 'alert-danger', 'message' => 'Mật khẩu hiện tại không đúng']);
        }
        return redirect('/profile');
    }
}
