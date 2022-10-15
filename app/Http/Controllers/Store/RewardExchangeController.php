<?php

namespace App\Http\Controllers\Store;

use App\Constants\SettingConstant;
use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RewardExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $total_star_con_lai = Functions::getStarConLai($user);
        $products = Product::where('company_code', $user->company_code)
            ->when(isset($request->category_id), function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            })->where('status',1)->paginate(SettingConstant::DEFAULT_PAGINATE);
        $categories = Category::where('company_code',$user->company_code)->get();
        if($request->ajax()){
            return view('store.reward_exchange.ajax',compact('products','categories','total_star_con_lai'));
        }
        return view('store.reward_exchange.index',compact('products','categories','total_star_con_lai'));
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
        //
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
}
