<?php

namespace App\Constants;

/**
 * Class HttpResponse
 *
 * @package App\Constants
 */
class SettingConstant
{
    const DEFAULT_PAGINATE = 20;

    const ROLE_ADMIN = 1;
    const ROLE_NHAN_VIEN = 2;

//    type cfrs
    const TYPE_OKR = 0;
    const TYPE_KHAC = 1;
    const TYPE_CFRS_PHAN_HOI = 0;
    const TYPE_CFRS_GHI_NHAN = 1;

//    type feedback
    const CHECK_IN = 0;
    const GHI_NHAN = 1; //ghi nhận
    const PHAN_HOI = 2; // phản hồi


    //    trạng thái checkin
    const NHAP = 0; //nháp
    const CHO_CHECK_IN = 1; //nháp
    const DA_CHECK_IN = 2; //đã checkin (Chờ phản hồi lần 1);
    const DA_PHAN_HOI = 3; //đã phản hồi
    const CHO_TONG_KET = 4; // chờ tổng kết của nv
    const CHO_PHAN_HOI_lAN_2 = 5; // phản hồi lần 2
    const DA_TONG_KET = 6; // đã tổng kết


    // trạng thái quá hạn checkin
    const CHECKIN_MUON = 0; //checkin muộn
    const QUA_HAN = 1; // quá hạn checkin
    const FEEDBACK_MUON = 2; //phản hồi muộn
}
