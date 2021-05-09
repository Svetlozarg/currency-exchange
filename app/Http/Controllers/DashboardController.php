<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\DashboardDataTable;
use Illuminate\Support\Facades\Http;
use App\Product;
use Illuminate\Support\Facades\DB;

use Auth;

class DashboardController extends Controller
{
    public function index(DashboardDataTable $dataTable) {
        // Checks if dashboards db is empty
        // If not empty find data that is different and update it
        if(empty(DB::table('dashboards')->count())){
            // Get Currecy API data
            $currenciesAPI = Http::get('https://openexchangerates.org/api/currencies.json');

            // Decode the API data
            $currencies = json_decode($currenciesAPI,true);

            // Get Rates API data
            $data = Http::get('https://openexchangerates.org/api/latest.json?app_id=48821a3d490642018a965540d86caa82')['rates'];

            // Loop through the data and insert it in the dashboards db
            foreach ($data as $price => $name) {
                DB::table('dashboards')->insert([
                        'currency' => $currencies[$price],
                        'code' => $price,
                        'rate' => $name,
                    ]);
            }
        } else {
            // Get Currecy API data
            $currenciesAPI = Http::get('https://openexchangerates.org/api/currencies.json');

            $currencies = json_decode($currenciesAPI,true);

            // Get Rates API data
            $data = Http::get('https://openexchangerates.org/api/latest.json?app_id=48821a3d490642018a965540d86caa82')['rates'];

            foreach ($data as $price => $name) {
                // Get the row's rate value
                $value = DB::table('dashboards')->where('currency', $currencies[$price])->value('rate');

                // Check if value is not equal to the curreny value and update it
                if ($value != $name) {
                    DB::table('dashboards')->where('currency', $currencies[$price])->update([
                        'currency' => $currencies[$price],
                        'code' => $price,
                        'rate' => $name,
                    ]);
                }
            }
        }

        return $dataTable->render('dashboard');
    }
}
