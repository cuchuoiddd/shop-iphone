<?php

namespace App\Http\Controllers;

use App\Constants\SettingConstant;
use App\Helpers\Functions;
use App\Models\Banner;
use App\Models\Capacity;
use App\Models\Category;
use App\Models\Cfrs;
use App\Models\Department;
use App\Models\HistoryCheckin;
use App\Models\LogCheckin;
use App\Models\Okr;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Time;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $setting = Setting::first();
        $categories = Category::orderBy('position')->get();
        $menu = Functions::buildMenu($categories);
//        $products = Product::orderBy('id','desc')->with('productOption.color')->get();

        $products = Product::when(isset($request->capacity_id),function ($q) use ($request){
            $q->where('capacity_id',$request->capacity_id);
        })->when(isset($request->category_id),function ($q) use ($request){
            $q->where('category_id',$request->category_id);
        })->orderBy('id','desc')->with('productOption.color')->paginate(SettingConstant::DEFAULT_PAGINATE);

        $banner = Banner::orderBy('position')->get();
        $capacity = Capacity::orderBy('position')->get();
        if($request->ajax()){
            return view('home.ajax',compact('products'));
        }
        return view('home.home',compact('setting','menu','products','banner','capacity'));
    }
}
