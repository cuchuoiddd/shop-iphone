<?php

namespace App\Http\Controllers\Store;

use App\Constants\SettingConstant;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $products = Product::where('company_code', $user->company_code)
            ->when(isset($request->category_id), function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            })->paginate(SettingConstant::DEFAULT_PAGINATE);
        $categories = Category::where('company_code', $user->company_code)->get();
        if ($request->ajax()) {
            return view('store.product.ajax', compact('categories', 'products'));

        }
        return view('store.product.index', compact('categories', 'products'));
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
            $data['thumbnail'] = $image->getFileInfo()->getFilename();
        }

        $user = Auth::user();

        $data['company_code'] = $user->company_code;
        Product::create($data);
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
        $product = Product::find($id);
        $data = $request->except('file');
        if ($request->file) {
            if ($product->thumbnail) {
                unlink(public_path('images/product/' . $product->thumbnail));
            }
            $extension = $request->file->getClientOriginalExtension();
            $filename = $request->file->getClientOriginalName();
            $destinationPath = '/images/product/';
            $picture = Str::slug(substr($filename, 0, strrpos($filename, "."))) . '_' . time() . '.' . $extension;
            $image = $request->file->move(public_path($destinationPath), $picture);
            $data['thumbnail'] = $image->getFileInfo()->getFilename();
        }
        $product->update($data);

        return back()->with(['type' => 'alert-success', 'message' => 'ádáldjxalsjdsạd;ákd;sakd;ákd;sak;sakd;sak;j']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    public function updateStatus(Request $request)
    {
        $status = $request->status == "true" ? 1 : 0;
        Product::find($request->id)->update(['status' => $status]);
        $data['success'] = 1;
        $data['status'] = $status;
        return $data;
    }
}
