<?php

namespace App\Console\Commands;

use App\Constants\SettingConstant;
use App\Models\Okr;
use Illuminate\Console\Command;

class LogCheckin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:log_checkin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = date('Y-m-d');
        $okrs = Okr::select('id','user_id','company_code')->whereIn('status',[SettingConstant::NHAP,SettingConstant::CHO_CHECK_IN])->whereDate('next_checkin',$date)->get();
        if(count($okrs) >0){
            foreach ($okrs as $item){
                $data['okr_id'] = $item->id;
                $data['user_id'] = $item->user_id;
                $data['company_code'] = $item->company_code;
                $data['type'] = SettingConstant::QUA_HAN;
                \App\Models\LogCheckin::create($data);
            }
        }

        return 1;
    }
}
