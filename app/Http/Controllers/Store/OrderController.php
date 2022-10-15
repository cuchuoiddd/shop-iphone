<?php

namespace App\Http\Controllers\Store;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cfrs;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('company_code',$user->company_code)->orderByDesc('id')->get();
        $categories = Category::where('company_code',$user->company_code)->orderByDesc('id')->get();
        return view('store.order.index',compact('orders','categories'));
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
        $total_star_con_lai = Functions::getStarConLai($user);
        if($total_star_con_lai >= ($request->quantity*$request->rate)){
            $data = $request->all();
            $data['code'] = Functions::generateRandomString(6);
            $data['user_id'] = $user->id;
            $data['user_duyet'] = 0;
            $data['status'] = 0;
            $data['company_code'] = $user->company_code;
            Order::create($data);

            $product = Product::find($request->product_id);
            $quantity = $product->quantity - $request->quantity;
            $product->update(['quantity' => $quantity]);

            return back();
        } else {
            return back()->with(['type' => 'alert-success', 'message' => 'Bạn không đủ sao']);
        }

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
        //
    }

    public function updateStatus(Request $request){
        $status = $request->status == "true" ? 1 : 0;
        Order::find($request->id)->update(['status'=>$status]);
        $data['success'] = 1;
        $data['status'] = $status;
        return $data;
    }
}
