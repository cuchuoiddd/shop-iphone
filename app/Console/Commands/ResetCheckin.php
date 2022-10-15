<?php

namespace App\Console\Commands;

use App\Constants\SettingConstant;
use App\Models\Okr;
use Illuminate\Console\Command;

class ResetCheckin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:reset_checkin';

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
        Okr::select('id','user_id','company_code')->where('status',SettingConstant::DA_PHAN_HOI)->whereDate('next_checkin',$date)->update(['status'=>SettingConstant::CHO_CHECK_IN]);
        return 1;
    }
}
