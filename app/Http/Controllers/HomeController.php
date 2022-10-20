<?php

namespace App\Http\Controllers;

use App\Constants\SettingConstant;
use App\Helpers\Functions;
use App\Models\Cfrs;
use App\Models\Department;
use App\Models\HistoryCheckin;
use App\Models\LogCheckin;
use App\Models\Okr;
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
        return view('home.home',compact('setting'));
    }
}
