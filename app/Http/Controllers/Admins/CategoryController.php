<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('position')->get();
        return view('admin.category.index',compact('categories'));
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
        $data = $request->all();
        if(!$request->parent_id){
            $data['parent_id'] = 0;
        }
        if(!$request->parent_id){
            $data['position'] = 0;
        }
        Category::create($data);
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
        $cate = Category::find($id)->update($request->all());
        return back()->with(['type' => 'alert-success', 'message' => 'Cập nhật thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $product = Product::where('category_id',$id)->first();
        $child = Category::where('parent_id',$id)->first();
        if($product){
            $data['success'] = false;
            $data['message'] = 'Tồn tại sản phẩm k được xóa !';
            return $data;
        }
        if ($child){
            $data['success'] = false;
            $data['message'] = 'Tồn tại danh mục con k được xóa !';
            return $data;
        }
        $category->delete();
        return 1;
    }
}
