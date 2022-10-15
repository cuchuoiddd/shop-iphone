<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Time;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    function __construct()
    {

    }

    public function index()
    {
        $user = Auth::user();
        $times = Time::where('company_code', $user->company_code)->get();
        return view('reports.index', compact('times'));
    }
}
