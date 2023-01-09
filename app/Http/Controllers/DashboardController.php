<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function titleChart() {
        $customer = DB::table('customers')->groupBy('lname')->orderBy('total')->pluck(DB::raw('count(lname) as total'),'lname')->all();
        // $customer = DB::table('customers')->groupBy('title')->orderBy('total')->pluck(DB::raw('count(title) as total'),'title')->all();
        $labels = (array_keys($customer));
        
        $data= array_values($customer);
        // dd($customer, $data, $labels);
        return response()->json(array('data' => $data, 'labels' => $labels));
    }

    public function SalesChart() {
        $repair = DB::table('repairs as r')
                    ->join('orderline as ol', 'r.repair_id', '=', 'ol.orderinfo_id')
                    ->join('orderinfo as oi', 'ol.orderinfo_id', '=', 'oi.orderinfo_id')
                    ->select(DB::raw('r.type as type, sum(r.price) as total'))
                    ->groupBy('r.type')
                    ->pluck('total','type')
                    ->all();
                    
        $labels = (array_keys($repair));
        $data= array_values($repair);
        return response()->json(array('data' => $data, 'labels' => $labels));
    }
}