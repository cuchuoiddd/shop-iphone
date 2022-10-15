<?php

namespace App\Http\Controllers;

use App\Constants\SettingConstant;
use App\Helpers\Functions;
use App\Models\Cfrs;
use App\Models\Department;
use App\Models\HistoryCheckin;
use App\Models\LogCheckin;
use App\Models\Okr;
use App\Models\Time;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('home');
    }

    function statusCheckin($company_code, $search_date)
    {
        if (count($search_date)) {
            $qua_han = LogCheckin::select('id')->where('company_code', $company_code)->whereBetween('created_at', [$search_date['start_date'], $search_date['end_date']])->where('type', SettingConstant::QUA_HAN)->count();
            $chua_check_in = Okr::select('id')->where('company_code', $company_code)->whereBetween('created_at', [$search_date['start_date'], $search_date['end_date']])->whereIn('status', [SettingConstant::NHAP, SettingConstant::CHO_CHECK_IN])->count();
            $history = HistoryCheckin::select('id', 'checkin_date', 'okr_id')->where('company_code', $company_code)->whereBetween('created_at', [$search_date['start_date'], $search_date['end_date']])->groupBy('checkin_date')->groupBy('okr_id');
        } else {
            $qua_han = LogCheckin::select('id')->where('company_code', $company_code)->where('type', SettingConstant::QUA_HAN)->count();
            $chua_check_in = Okr::select('id')->where('company_code', $company_code)->whereIn('status', [SettingConstant::NHAP, SettingConstant::CHO_CHECK_IN])->count();
            $history = HistoryCheckin::select('id', 'checkin_date', 'okr_id')->where('company_code', $company_code)->groupBy('checkin_date')->groupBy('okr_id');
        }
        $late = clone $history;
        $dung_han = $history->where('is_late', 0)->get()->count();
        $late = $late->where('is_late', 1)->get()->count();
        $data = [
            'qua_han' => $qua_han,
            'chua_check_in' => $chua_check_in,
            'dung_han' => $dung_han,
            'late' => $late,
        ];
        return $data;
    }

    function statusCFRS($date, $company_code, $search_date)
    {
        if (count($search_date)) {
            $cfrs_now = Cfrs::select('id', 'feedback_date', 'okr_id')->where('company_code', $company_code)->whereBetween('created_at', [$search_date['start_date'], $search_date['end_date']])->groupBy('feedback_date')->groupBy('okr_id');
        } else {
            $cfrs_now = Cfrs::select('id', 'feedback_date', 'okr_id')->where('company_code', $company_code)->whereBetween('created_at', [$date['weekStartDate'], $date['weekEndDate']])->groupBy('feedback_date')->groupBy('okr_id');
            $cfrs_last = Cfrs::select('id', 'feedback_date', 'okr_id')->where('company_code', $company_code)->whereBetween('created_at', [$date['last_weekStartDate'], $date['last_weekEndDate']])->groupBy('feedback_date')->groupBy('okr_id');
        }
        $feedback_cfrs_now = clone $cfrs_now;
        $feedback_cfrs_last = clone $cfrs_last;

        $feedback_cfrs_now = $feedback_cfrs_now->where('type', SettingConstant::TYPE_CFRS_PHAN_HOI)->get();
        $feedback_cfrs_last = !empty($cfrs_last) ? $feedback_cfrs_last->where('type', SettingConstant::TYPE_CFRS_PHAN_HOI)->get() : [];

        $ghi_nhan_cfrs_now = $cfrs_now->where('type', SettingConstant::TYPE_CFRS_GHI_NHAN)->get();
        $ghi_nhan_cfrs_last = !empty($cfrs_last) ? $cfrs_last->where('type', SettingConstant::TYPE_CFRS_GHI_NHAN)->get() : [];

        $data = [
            'feedback_cfrs_now' => count($feedback_cfrs_now) ? $feedback_cfrs_now->count() : 0,
            'feedback_cfrs_last' => count($feedback_cfrs_last) ? $feedback_cfrs_last->count() : 0,
            'ghi_nhan_cfrs_now' => count($ghi_nhan_cfrs_now) ? $ghi_nhan_cfrs_now->count() : 0,
            'ghi_nhan_cfrs_last' => count($ghi_nhan_cfrs_last) ? $ghi_nhan_cfrs_last->count() : 0,
        ];
        return $data;
    }

    function rankStar($company_code)
    {
        $now = Carbon::now();
        $now_end = clone $now;
        $monthStart = $now->startOfMonth();
        $monthEnd = $now_end->endOfMonth();

        $star_user = Cfrs::select('user_cfrs', 'user_id', DB::raw('SUM(current_rate) as total_star'))
            ->where('company_code', $company_code)->whereBetween('created_at', [$monthStart, $monthEnd]);
        $user_receive = clone $star_user;
        $star_user_receive = $user_receive->groupBy('user_cfrs')->orderByDesc('total_star')->get();
        $star_user_tranfer = $star_user->groupBy('user_id')->orderByDesc('total_star')->get();
        $data = [
            'star_user_receive' => $star_user_receive,
            'star_user_tranfer' => $star_user_tranfer
        ];
        return $data;
    }

    function ghiNhan($user,$search)
    {
        $ghi_nhan = Cfrs::where('company_code', $user->company_code)
            ->where('type_cfrs', SettingConstant::TYPE_CFRS_PHAN_HOI)
            ->when(isset($search['arr_user_cfrs']),function ($q) use ($search){
                $q->whereIn('user_cfrs',$search['arr_user_cfrs']);
            })->when(isset($search['user_cfrs']),function ($q) use ($search){
                $q->where('user_cfrs',$search['user_cfrs']);
            })->when(isset($search['user_id']),function ($q) use ($search){
                $q->where('user_id',$search['user_id']);
            })
            ->orderByDesc('id')->take(30)->get();
        return $ghi_nhan;
    }

    public function searchCfrs(Request $request){
        $user = Auth::user();
        if($request->department_id){
            $search['arr_user_cfrs'] = User::where('department_id',$request->department_id)->pluck('id')->toArray();
        }else {
            $user_inferior = User::where('parent_id',$user->id)->pluck('id')->toArray(); //Cấp dưới
            if(count($user_inferior)){
                array_push($user_inferior,$user->id);
                $search['array_user_cfrs'] =  $user_inferior;
            } else {
                $search['user_cfrs'] = $user->id;
            }
        }
        $ghi_nhan = self::ghiNhan($user,$search);
        $departments = Department::where('company_code', $user->company_code)->get();
        return view('dashboard.rankCFRs', compact('ghi_nhan','departments'));
    }
}
