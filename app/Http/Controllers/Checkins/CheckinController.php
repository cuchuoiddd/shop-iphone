<?php

namespace App\Http\Controllers\Checkins;

use App\Constants\SettingConstant;
use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Cfrs;
use App\Models\CfrsOkr;
use App\Models\CheckinOkr;
use App\Models\FeedbackStatus;
use App\Models\HistoryCheckin;
use App\Models\Okr;
use App\Models\Target;
use App\Models\Time;
use App\Models\Unit;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        $input['company_code'] = $user->company_code;
        if ($request->user_id) {
            $input['user_id'] = $request->user_id;
        } else {
            $input['user_id'] = $user->id;
        }

        $users = [];
        if ($user->role_id == SettingConstant::ROLE_ADMIN) {
            $users = User::where('company_code', $user->company_code)->get();
        }


        if ($request->ajax()) {
            $okrs = Okr::search($input)->with('target', 'summary')->get();
            return view('checkin.ajax', compact('okrs'));
        }

        $feedback_status = FeedbackStatus::where('company_code', $user->company_code)
            ->where('type', SettingConstant::CHECK_IN)->get();
        $times = Time::where('company_code', $user->company_code)->get();
        $okrs = Okr::search($input)->with('target', 'summary')->paginate(10);
        $okrs->setCollection($okrs->getCollection()->map(function ($item) use ($request) {

//            $arr_target = $item->target->pluck('id')->toArray();
            $count_arr_target = count($item->target);

            $history = HistoryCheckin::where('okr_id', $item->id)->orderByDesc('id')->groupBy('checkin_date');
            $history1 = clone $history;
//
            if(count($history->get())){
                $date_first = $history->first();
                $data_his = HistoryCheckin::where('checkin_date',$date_first->checkin_date)->get(); //get lần checkin mới nhất
                $total_phan_tram = 0;
                if(count($data_his)){
                    foreach ($data_his as $item1){
                        if($item1->target){
                            $phan_tram = round((($item1->value)/($item1->target->target))*100,0);
                            $total_phan_tram+= $phan_tram;
                        }
                    }
                }
                $item->tien_do = round($total_phan_tram/$count_arr_target,0);
            } else {
                $item->tien_do = 0;
            }
            if(count($history->get())>1){
                $date_second = $history1->skip(1)->first();
                $data_his_second = HistoryCheckin::where('checkin_date',$date_second->checkin_date)->get(); //get lần checkin mới thứ 2
                $total_phan_tram_second = 0;
                if(count($data_his_second)){
                    foreach ($data_his_second as $item1){
                        if($item1->target){
                            $phan_tram = round((($item1->value)/($item1->target->target))*100,0);
                            $total_phan_tram_second+= $phan_tram;
                        }
                    }
                }

                $item->thay_doi = $item->tien_do - round($total_phan_tram_second/$count_arr_target,0);
            } else {
                $item->thay_doi = $item->tien_do;
            }

            return $item;
        }));
        $units = Unit::where('company_code', $user->company_code)->get();

        if($user->parent_id){
            $arr_okr_parent = Okr::where('company_code', $user->company_code)->where('user_id', $user->parent_id)->pluck('id')->toArray();
            $target_okr = Target::where('company_code', $user->company_code)->whereIn('okr_id',$arr_okr_parent)->get();
        }else {
            $target_okr = Target::where('company_code', $user->company_code)->get();
        }

        return view('checkin.index', compact('users', 'okrs', 'feedback_status', 'times', 'user', 'units', 'target_okr'));
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
        $target = Target::find($request->target_id[0]);
        $okr = Okr::find($target->okr_id);

        $date_now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        if ($date_now > $okr->next_checkin) {
            $check_late = 1;
        } else {
            $check_late = 0;
        };
        foreach ($request->target_id as $key => $item) {
            $status = 'status_' . $key;
            $done = 'done_' . $key;
            $data['target_id'] = $item;
            $data['value'] = str_replace(',','',$request->value[$key]);
            $data['status'] = $request->$status;
            $data['okr_id'] = $okr->id;
            $data['company_code'] = $okr->company_code;
            $data['is_late'] = $check_late;
            $data['checkin_date'] = $date_now;
            $data['done'] = $request->$done ?: 0;
            $data['text_1'] = $request->text_1[$key];
            $data['text_2'] = $request->text_2[$key];
            $data['text_3'] = $request->text_3[$key];
            $data['text_4'] = $request->text_4[$key];
            if ($okr->status == 0) { //trường hợp đã lưu nháp
                $history = HistoryCheckin::where('target_id', $item)->orderByDesc('id')->first();
                $history->update($data);

            } else {
                HistoryCheckin::create($data);
            }
        }

        $data_okr['done'] = $request->done_okr ?: 0;
        $data_okr['next_checkin'] = Functions::yearMonthDay($request->next_checkin);
        $data_okr['status_target'] = $request->status_target;
        if($request->is_luu_nhap && $request->is_luu_nhap == 1){
            $data_okr['status'] = SettingConstant::NHAP;
        }else {
            $data_okr['status'] = SettingConstant::DA_CHECK_IN;
        }

        $okr->update($data_okr);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getOkr(Request $request)
    {
        $okr = Okr::where('parent_id', $request->id)->with('children', 'target', 'summary','user')->get();
        $okr->map(function ($item) {
            $sum_target = $item->target->sum('target');
            $arr_target = $item->target->pluck('id')->toArray();
            $history = HistoryCheckin::whereIn('target_id', $arr_target)->orderByDesc('id');
            $sum_value = $history->take(count($arr_target))->get()->sum('value');
            if (count($history->take(count($arr_target) * 2)->get()) > count($arr_target)) {
                $sum_value_old = $history->take(count($arr_target) * 2)->get()->slice(count($arr_target))->sum('value');
            } else {
                $sum_value_old = 0;
            }
            if($sum_target > 0){
                $thay_doi = round(($sum_value / $sum_target) * 100, 0);
                $thay_doi_old = round(($sum_value_old / $sum_target) * 100, 0);
            } else {
                $thay_doi = 0;
                $thay_doi_old = 0;
            }
            $item->tien_do = $thay_doi;
            $item->thay_doi = $thay_doi - $thay_doi_old;
            return $item;
        });
        return $okr;
    }

    /**
     * get data cho modal check-in
     *
     * @param Request $request
     * @return mixed
     */
    public function getTarget(Request $request)
    {
        $data['okr'] = Okr::where('id', $request->id)->with('target.unit')->first();
        $history = HistoryCheckin::where('okr_id', $request->id)->orderByDesc('id')->groupBy('checkin_date');
        $history1 = clone $history;
        $history2 = clone $history;

        if(count($history2->get())){
            $date_first = $history->first();
            $data['history'] = HistoryCheckin::where('checkin_date',$date_first->checkin_date)->get(); //get lần checkin mới nhất
        } else {
            $data['history'] = [];
        }
        if(count($history2->get())>1){
            $date_second = $history1->skip(1)->first();
            $data['history_second'] = HistoryCheckin::where('checkin_date',$date_second->checkin_date)->get(); //get lần checkin mới thứ 2
        } else {
            $data['history_second'] = [];
        }

        $check_permission_edit_okr = Auth::id() == $data['okr']->user_id;
        $data['check_permission_edit_okr'] = $check_permission_edit_okr;
        return $data;
    }

    /**
     * phản hồi lần 1
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function phanHoiLan1(Request $request)
    {
        if (count($request->target_id)) {
            $target = Target::find($request->target_id[0]);
            $okr = Okr::find($target->okr_id);
            $user = Auth::user();
            foreach ($request->target_id as $key => $item) {
                if($request->star_custom[$key] == null){
                    $feedback = FeedbackStatus::find($request->feedback_status_id[$key]);
                    $star_rate = $feedback ? $feedback->rate : 0;
                } else {
                    $star_rate = $request->star_custom[$key];
                }

                $data_csrf['target_id'] = $item;
                $data_csrf['user_cfrs'] = $okr->user_id;
                $data_csrf['okr_id'] = $okr->id;
                $data_csrf['time_id'] = $okr->time_id;
                $data_csrf['type'] = SettingConstant::TYPE_OKR;
                $data_csrf['feedback_status_id'] = $request->feedback_status_id[$key];
                $data_csrf['current_rate'] = $star_rate;
                $data_csrf['history_checkin_id'] = $request->history_checkin_id[$key];
                $data_csrf['content'] = $request->input('content')[$key];
                $data_csrf['user_id'] = $user->id;
                $data_csrf['company_code'] = $user->company_code;
                $data_csrf['feedback_date'] = date('Y-m-d');
                Cfrs::create($data_csrf);
            }

            if($request->star_custom_okr){
                $data_csrf_okr['current_rate'] = $request->star_custom_okr;
            } else {
                $star_rate = FeedbackStatus::find($request->feedback_status_id_okr)->rate;
                $data_csrf_okr['current_rate'] = $star_rate;
            }

            $data_csrf_okr['feedback_status_id'] = $request->feedback_status_id_okr;
            $data_csrf_okr['okr_id'] = $okr->id;
            $data_csrf_okr['content'] = $request->content_okr;
            $data_csrf_okr['company_code'] = $user->company_code;
            CfrsOkr::create($data_csrf_okr);

            if ($okr->done == 1) {
                $data_okr['status'] = 4;
            } else {
                $data_okr['status'] = 3;
            }
            $okr->update($data_okr);
        }
        return back()->with(['type' => 'alert-danger', 'message' => 'Phản hồi thành công']);
    }

    public function getDetailTarget($target_id)
    {
        $data = Target::find($target_id);
        return $data;
    }

    public function updateTarget(Request $request)
    {
        $data = $request->except('target_id');
        $data['target'] = str_replace(',','',$request->target);
        Target::find($request->target_id)->update($data);
        return back();
    }

    public function deleteTarget($target_id)
    {
        $history = HistoryCheckin::where('target_id',$target_id)->first();
        if ($history){
            return 0;
        } else {
            Target::find($target_id)->delete();
            return 1;
        }
    }

    public function createTarget(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        if(isset($request->parent_id)){
            $data['parent_id'] = json_encode($request->parent_id);
        }
        $data['company_code'] = $user->company_code;
        Target::create($data);
        return back();
    }

    public function getFeedbackDepartment($okr_id){
        $okr = Okr::find($okr_id);
        $user_okr = User::find($okr->user_id);
        $feedbacks = FeedbackStatus::where('company_code',$user_okr->company_code)
            ->where('department_id',$user_okr->department_id)
            ->where('type', SettingConstant::CHECK_IN)->orderBy('position')->get();
        return $feedbacks;
    }
}
