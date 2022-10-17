<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

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
            return back()->withErrors($validator);
        }

        $data = $request->except('file');

        if ($request->file) {

            $extension = $request->file->getClientOriginalExtension();
            $filename = $request->file->getClientOriginalName();
            $destinationPath = '/images/product/';
            $picture = Str::slug(substr($filename, 0, strrpos($filename, "."))) . '_' . time() . '.' . $extension;
            $image = $request->file->move(public_path($destinationPath), $picture);
            $data['thumbnail'] = $destinationPath.$image->getFileInfo()->getFilename();
        }

        Setting::create($request->all());
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

        if ($request->file) {

            $extension = $request->file->getClientOriginalExtension();
            $filename = $request->file->getClientOriginalName();
            $destinationPath = '/images/product/';
            $picture = Str::slug(substr($filename, 0, strrpos($filename, "."))) . '_' . time() . '.' . $extension;
            $image = $request->file->move(public_path($destinationPath), $picture);
            $data['thumbnail'] = $destinationPath.$image->getFileInfo()->getFilename();
        }


        $setting = Setting::find($id);
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
}
