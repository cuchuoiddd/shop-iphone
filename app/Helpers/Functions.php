<?php

namespace App\Helpers;

use App\Models\Cfrs;
use App\Models\HistoryCheckin;
use App\Models\Order;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Functions
{
    /**
     * Random voucher
     *
     * @param length
     *
     * @return random String
     */
    public static function generateRandomString($length = 6)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function yearMonthDayTime($date)
    {
        return Carbon::createFromFormat('d-m-Y H:i', $date)->format('Y-m-d H:i');
    }

    public static function yearMonthDay($date)
    {
        return Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d');
    }

    public static function dayMonthYearTime($date)
    {
        return Carbon::parse($date)->format('d-m-Y H:i');
    }


    public static function dayMonthYear($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }

    public static function returnDateChuKy($time_id)
    {
        $data = [];
        $time = Time::find($time_id);
        if (isset($times) && $times) {
            $data['start_date'] = self::yearMonthDay($time->start_date);
            $data['end_date'] = self::yearMonthDay($time->end_date);
        }
        return $data;
    }

    public static function uploadImage($file,$path)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = $file->getClientOriginalName();
        $picture = Str::slug(substr($filename, 0, strrpos($filename, "."))) . '_' . time() . '.' . $extension;
        $image = $file->move(public_path($path), $picture);
        return $path.$image->getFileInfo()->getFilename();
    }

    public static function unlinkUpload($path)
    {
        if (!empty($path)) {
            @unlink(public_path($path));
        }
    }

    public static function showTextStatusOkr($status)
    {
        switch ($status) {
            case 0:
                echo 'Đã nháp';
                break;
            case 1:
                echo 'Chờ check-in';
                break;
            case 2:
                echo 'Chờ phản hồi';
                break;
            case 3:
                echo 'Đã Check-in';
                break;
            case 4:
                echo 'Chờ tổng kết';
                break;
            case 5:
                echo 'Chờ phản hồi';
                break;
            case 6:
                echo 'Đã tổng kết';
                break;

            default:
                echo '';
        }
    }
    public static function showColorOkr($status)
    {
        switch ($status) {
            case 0:
                return '#688b67';
                break;
            case 1:
                return '#1e88e5';
                break;
            case 2:
                return '#ff9b04';
                break;
            case 3:
                return '#26c6da';
                break;
            case 4:
                return '#8d6658';
                break;
            case 5:
                return '#465161';
                break;
            case 6:
                return '#7c277d';
                break;
            default:
                echo '';
        }
    }

    public static function showClassStatusOkr($status)
    {
        switch ($status) {
            case 0:
                return 'openFormCheckin';
                break;
            case 1:
                return 'openFormCheckin';
                break;
            case 2:
                return 'openFormFeedback1';
                break;
            case 3:
                return 'openFormCheckin';
                break;
            case 4:
                return 'openFormSummary';
                break;
            case 5:
                return 'openFormFeedback2';
                break;
            default:
                return '';
        }
    }

    public static function statusOkr($date, $company_code, $search_date)
    {
        if (count($search_date)) {
            $history_checkin_now = HistoryCheckin::where('company_code', $company_code)->whereBetween('created_at', [$search_date['start_date'], $search_date['end_date']])->groupBy('target_id')->orderByDesc('id')->with('target')->get();
            $history_checkin_last = [];
            $history_checkin_second = [];
        } else {
            $history_checkin_now = HistoryCheckin::where('company_code', $company_code)->whereBetween('created_at', [$date['weekStartDate'], $date['weekEndDate']])->groupBy('target_id')->orderByDesc('id')->with('target')->get();
            $history_checkin_last = HistoryCheckin::where('company_code', $company_code)->whereBetween('created_at', [$date['last_weekStartDate'], $date['last_weekEndDate']])->groupBy('target_id')->orderByDesc('id')->with('target')->get();
            $history_checkin_second = HistoryCheckin::where('company_code', $company_code)->whereBetween('created_at', [$date['second_weekStartDate'], $date['second_weekEndDate']])->groupBy('target_id')->orderByDesc('id')->with('target')->get();
        }

        if (count($history_checkin_now)) {
            $data_now = [];
            $rankSuccessNow = [];
            $rankRuningNow = [];
            $rankFailedNow = [];
            $rank0Now = [];
            foreach ($history_checkin_now as $item) {
                if($item->target && $item->target->target >0){
                    $percent = $item->value / ($item->target->target) * 100;
                    $data_now[$item->target->okr_id][] = $percent;
                } else {
                    $percent = 0;
//                    $data_now[$item->target->okr_id][] = $percent;
                    $data_now[null][] = $percent;

                }

            }
            foreach ($data_now as $key => $i) {
                $last_percent = array_sum($i) / count($i);
                if ($last_percent >= 1 && $last_percent <= 40) {
                    $rankFailedNow[] = 1;
                } elseif ($last_percent >= 41 && $last_percent < 70) {
                    $rankRuningNow[] = 1;
                } elseif ($last_percent >= 71) {
                    $rankSuccessNow[] = 1;
                } elseif ($last_percent == 0) {
                    $rank0Now[] = 1;
                }
            }
        }
        if (count($history_checkin_last)) {
            $data_last = [];
            $rankSuccessLast = [];
            $rankRuningLast = [];
            $rankFailedLast = [];
            $rank0Last = [];
            foreach ($history_checkin_last as $item) {
                $percent = $item->value / ($item->target->target) * 100;
                $data_last[$item->target->okr_id][] = $percent;
            }
            foreach ($data_last as $key => $i) {
                $last_percent = array_sum($i) / count($i);
                if ($last_percent >= 1 && $last_percent <= 40) {
                    $rankFailedLast[] = 1;
                } elseif ($last_percent >= 41 && $last_percent < 70) {
                    $rankRuningLast[] = 1;
                } elseif ($last_percent >= 71) {
                    $rankSuccessLast[] = 1;

                } elseif ($last_percent == 0) {
                    $rank0Last[] = 1;
                }
            }
        }
        if (count($history_checkin_second)) {
            $data_second = [];
            $rankSuccessSecond = [];
            $rankRuningSecond = [];
            $rankFailedSecond = [];
            $rank0Second = [];
            foreach ($history_checkin_second as $item) {
                $percent = $item->value / ($item->target->target) * 100;
                $data_second[$item->target->okr_id][] = $percent;
            }
            foreach ($data_second as $key => $i) {
                $last_percent = array_sum($i) / count($i);
                if ($last_percent >= 1 && $last_percent <= 40) {
                    $rankFailedSecond[] = 1;
                } elseif ($last_percent >= 41 && $last_percent < 70) {
                    $rankRuningSecond[] = 1;
                } elseif ($last_percent >= 71) {
                    $rankSuccessSecond[] = 1;

                } elseif ($last_percent == 0) {
                    $rank0Second[] = 1;
                }
            }
        }


        $rankSuccess = [
            'now' => isset($rankSuccessNow) ? array_sum($rankSuccessNow) : 0,
            'last' => isset($rankSuccessLast) ? array_sum($rankSuccessLast) : 0,
            'second' => isset($rankSuccessSecond) ? array_sum($rankSuccessSecond) : 0,
        ];
        $rankRuning = [
            'now' => isset($rankRuningNow) ? array_sum($rankRuningNow) : 0,
            'last' => isset($rankRuningLast) ? array_sum($rankRuningLast) : 0,
            'second' => isset($rankRuningSecond) ? array_sum($rankRuningSecond) : 0,
        ];
        $rankFailed = [
            'now' => isset($rankFailedNow) ? array_sum($rankFailedNow) : 0,
            'last' => isset($rankFailedLast) ? array_sum($rankFailedLast) : 0,
            'second' => isset($rankFailedSecond) ? array_sum($rankFailedSecond) : 0,
        ];
        $rank0 = [
            'now' => isset($rank0Now) ? array_sum($rank0Now) : 0,
            'last' => isset($rank0Last) ? array_sum($rank0Last) : 0,
            'second' => isset($rank0Second) ? array_sum($rank0Second) : 0,
        ];
        return [
            'rankSuccess' => $rankSuccess,
            'rankRuning' => $rankRuning,
            'rankFailed' => $rankFailed,
            'rank0' => $rank0,
        ];
    }

    public static function getStarConLai($user){
        $total_star = Cfrs::where('user_cfrs',$user->id)->withCount([
            'feedbackStatus AS paid_sum' => function ($query) {
                $query->select(DB::raw("SUM(rate) as paidsum"));
            }
        ])->get()->sum('paid_sum');

        $total_star_used = Order::where('user_id',$user->id)->get()->map(function ($m){
            $m->total = $m->quantity*$m->rate;
            return $m;
        })->sum('total');

        return $total_star - $total_star_used;
    }
}