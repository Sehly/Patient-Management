<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use App\Models\Patient;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index(Request $request)
    {

        $date = $request->input('date', date('Y-m-d'));


        $patients = Patient::whereDate('Date', $date)->get();


        $revenue = Revenue::whereDate('Date', $date)->first();


        $totalRevenue = $patients->sum('Total_Amount');
        $totalDiscount = $patients->sum('Discount');

        if ($revenue) {
            $revenue->Total_Payment = $totalRevenue;
            $revenue->Total_Discount = $totalDiscount;
            $revenue->save();
        } else {

            Revenue::create([
                'Date' => $date,
                'Total_Payment' => $totalRevenue,
                'Total_Discount' => $totalDiscount,
            ]);
        }

        $revenues = Revenue::whereDate('Date', $date)->get();

        return view('revenue.index', compact('revenues', 'patients', 'date', 'totalRevenue'));
    }
}
