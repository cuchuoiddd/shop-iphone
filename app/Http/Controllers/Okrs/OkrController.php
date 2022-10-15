<?php

namespace App\Http\Controllers\Okrs;

use App\Constants\SettingConstant;
use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\HistoryCheckin;
use App\Models\MappingOkr;
use App\Models\Okr;
use App\Models\Target;
use App\Models\Time;
use App\Models\Unit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OkrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $users = User::where('company_code', $user->company_code)->where('id', '<>', $user->id)->get();
        $times = Time::where('company_code', $user->company_code)->get();
        $okr_parent = Okr::where('company_code', $user->company_code)->where('user_id', $user->parent_id);
        $okr_parent_clone = clone $okr_parent;
        $okr_parent = $okr_parent->get();

        $okr_mappings = Okr::where('company_code', $user->company_code)->where('user_id', '<>', $user->department_id)->get();
        if($user->parent_id){
            $arr_okr_parent = $okr_parent_clone->pluck('id')->toArray();
            $target_okr = Target::where('company_code', $user->company_code)->whereIn('okr_id',$arr_okr_parent)->get();
        }else {
            $target_okr = Target::where('company_code', $user->company_code)->get();
        }
        $units = Unit::where('company_code', $user->company_code)->get();
        return view('okrs.okr.index', compact('user', 'users', 'times', 'okr_parent', 'units', 'okr_mappings', 'target_okr'));
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
        $user = Auth::user();
        $data_ork = [
            'title' => $request->title,
            'time_id' => $request->time_id,
            'parent_id' => $request->parent_okr_id,
            'public' => $request->public,
            'company_code' => $user->company_code,
            'user_id' => $user->id,
            'next_checkin' => Functions::yearMonthDay($request->next_checkin),
            'share_okr' => isset($request->share_okr) ? json_encode($request->share_okr) : NULL,
            'department_id' => $user->department_id,
            'status' => SettingConstant::CHO_CHECK_IN
        ];
        $okr_insert = Okr::create($data_ork);


        if (!empty($request->name)) {
            foreach ($request->name as $key => $item) {
                $data_target = [
                    'name' => $item,
                    'okr_id' => $okr_insert->id,
                    'target' => str_replace(',', '', $request->target[$key]),
                    'unit_id' => $request->unit_id[$key],
                    'link_okr' => $request->link_okr[$key],
                    'link_result' => $request->link_result[$key],
                    'parent_id' =>isset($request->parent_id) && count($request->parent_id) && !empty($request->parent_id[$key]) ? json_encode($request->parent_id[$key]) : NULL,
                    'company_code' => $user->company_code,
                ];

                Target::create($data_target);
            }
        }

        if (!empty($request->mapping_okr_id[0])) {
            foreach ($request->mapping_okr_id as $key => $item) {
                MappingOkr::create(['okr_id' => $okr_insert->id, 'okr_mapping_id' => $item, 'company_code' => $user->company_code]);
            }
        }
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
        $user = Auth::user();
        $users = User::where('company_code', $user->company_code)->where('id', '<>', $user->id)->get();
        $times = Time::where('company_code', $user->company_code)->get();
        $okr_parent = Okr::where('company_code', $user->company_code)->where('user_id', $user->parent_id);
        $okr_parent_clone = clone $okr_parent;
        $okr_parent = $okr_parent->get();
        $okr_mappings = Okr::where('company_code', $user->company_code)->where('user_id', '<>', $user->department_id)->get();
        if($user->parent_id){
            $arr_okr_parent = $okr_parent_clone->pluck('id')->toArray();
            $target_okr = Target::where('company_code', $user->company_code)->whereIn('okr_id',$arr_okr_parent)->get();
        }else {
            $target_okr = Target::where('company_code', $user->company_code)->get();
        }
        $units = Unit::where('company_code', $user->company_code)->get();

        $myOkrs = Okr::where('id', $id)->where('company_code', $user->company_code)->first();
        $myTarget = Target::where('company_code', $user->company_code)->where('okr_id', $id)->get();
        return view('okrs.okr.update', compact('myTarget', 'myOkrs', 'user', 'users', 'times', 'okr_parent', 'units', 'okr_mappings', 'target_okr'));

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
        $user = Auth::user();
        $data_ork = [
            'title' => $request->title,
            'time_id' => $request->time_id,
            'parent_id' => $request->parent_okr_id,
            'public' => $request->public,
            'share_okr' => isset($request->share_okr) ? json_encode($request->share_okr) : NULL,
        ];
        Okr::where('id', $id)->where('company_code', $user->company_code)->update($data_ork);
        if (!empty($request->name)) {
            foreach ($request->name as $key => $item) {
                $data_target = [
                    'name' => $item,
                    'okr_id' => $id,
                    'target' => str_replace(',', '', $request->target[$key]),
                    'unit_id' => $request->unit_id[$key],
                    'link_okr' => $request->link_okr[$key],
                    'link_result' => $request->link_result[$key],
                    'parent_id' => isset($request->parent_id) && count($request->parent_id) && !empty($request->parent_id[$key]) ? json_encode($request->parent_id[$key]) : NULL,
                    'company_code' => $user->company_code,
                ];
                if (!empty(@$request->target_id[$key])) {
                    Target::find($request->target_id[$key])->update($data_target);
                } else {
                    Target::create($data_target);
                }
            }
        }

        if (!empty($request->mapping_okr_id[0])) {
            foreach ($request->mapping_okr_id as $key => $item) {
                MappingOkr::create(['okr_id' => $data_ork, 'okr_mapping_id' => $item, 'company_code' => $user->company_code]);
            }
        }
        if (isset($request->delete_target) && count($request->delete_target)){
            Target::whereIn('id',$request->delete_target)->delete();
        }

        return back()->with('alert-success', 'chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $okr = Okr::find($id);
        if($okr->user_id == Auth::id()){
            $target = Target::where('okr_id',$okr->id)->first();
            if($target){
                $data['success'] = false;
                $data['message'] = 'Có kr không được xóa !';
                return $data;
            } else {
                $okr->delete();
                return 1;
            }
        } else {
            $data['success'] = false;
            $data['message'] = 'Bạn không có quyền xóa !';
            return $data;
        };
    }

    /**
     * Quản lý okr
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function objective(Request $request)
    {
        $user = Auth::user();
        $times = Time::where('company_code', $user->company_code)->get();
        $users = User::where('company_code', $user->company_code)->get();
        $input = $request->all();
        $input['company_code'] = $user->company_code;
        $okrs = Okr::search($input)->with('target', 'summary')->orderByDesc('id')->paginate(SettingConstant::DEFAULT_PAGINATE);
        $okrs->setCollection($okrs->getCollection()->map(function ($item) use ($request) {
            $sum_target = $item->target->sum('target');
            $arr_target = $item->target->pluck('id')->toArray();
            $history = HistoryCheckin::whereIn('target_id', $arr_target)->orderByDesc('id');
            $sum_value = $history->take(count($arr_target))->get()->sum('value');
            $item->checkin_date = $history->first() ? $history->first()->checkin_date : null;
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
        }));
        if ($request->ajax()) {
            return view('okrs.objective.ajax', compact('okrs', 'times', 'users'));
        }
        return view('okrs.objective.index', compact('okrs', 'times', 'users'));
    }

    public function updateDoneOkr(Request $request)
    {
        $status = $request->status == "true" ? 1 : 0;
        Okr::find($request->id)->update(['done' => $status]);
        $data['success'] = 1;
        $data['status'] = $status;
        return $data;
    }
}
