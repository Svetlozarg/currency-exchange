<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ChartJsController extends Controller
{
    public function index()
    {
        $currency = DB::table('dashboards')->pluck('currency');

        $rate = DB::table('dashboards')->pluck('rate');

    	return view('chartjs')->with('currency',json_encode($currency,JSON_NUMERIC_CHECK))->with('rate',json_encode($rate,JSON_NUMERIC_CHECK));
    }
}
