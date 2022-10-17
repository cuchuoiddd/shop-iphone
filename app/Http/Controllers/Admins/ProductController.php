<?php

namespace App\Http\Controllers\Admins;

use App\Constants\SettingConstant;
use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Capacity;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(SettingConstant::DEFAULT_PAGINATE);
        $capacities = Capacity::all();
        $colors = Color::all();
        return view('admin.product.index',compact('categories','products','capacities','colors'));
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

        $data = $request->except('file','color_id','new_price','old_price');

        if ($request->file) {
            $destinationPath = '/images/product/';
            $data['thumbnail'] = Functions::uploadImage($request->file,$destinationPath);
        }
        $product = Product::create($data);

        if(count($request->color_id)){
            foreach ($request->color_id as $key=>$item){
                $data_option['color_id'] = $item;
                $data_option['new_price'] = str_replace(',', '', $request->new_price[$key]);
                $data_option['old_price'] = str_replace(',', '', $request->old_price[$key]);
                $data_option['product_id'] = $product->id;
                ProductOption::create($data_option);
            }
        }
        return back()->with(['type' => 'alert-success', 'message' => 'Thêm mới thành công']);
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
        $product = Product::find($id);
        ProductOption::where('product_id',$id)->delete();
        $product->delete();
        return 1;
    }

    public function updateStatus(Request $request)
    {
        $status = $request->status == "true" ? 1 : 0;
        Product::find($request->id)->update(['status' => $status]);
        $data['success'] = 1;
        $data['status'] = $status;
        return $data;
    }

    public function getInfoProduct($id){
        $product = Product::where('id',$id)->with('productOption')->first();
        return $product;
    }
}
