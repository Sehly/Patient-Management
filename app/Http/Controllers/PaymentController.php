<?php


namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Patient $patient)
    {
        $payments = $patient->payments; 
        return view('payments.index', compact('payments', 'patient'));
    }

    public function show(Patient $patient, Payment $payment)
    {
        return view('payments.show', compact('payment', 'patient'));
    }

    public function edit(Patient $patient, Payment $payment)
    {
        return view('payments.edit', compact('payment', 'patient'));
    }

    public function update(Request $request, Patient $patient, Payment $payment)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'discount' => 'nullable|numeric|min:0|max:100',
            'payment_date' => 'nullable|date',
        ]);

        $discount = $request->input('discount', 0);
        $amount = $request->input('amount');
        $finalAmount = $amount - ($amount * ($discount / 100));

        $payment->update([
            'amount' => $finalAmount,
            'payment_method' => $request->input('payment_method'),
            'discount' => $discount,
            'payment_date' => $request->input('payment_date'),
        ]);

        return redirect()->route('payments.index', $patient->id);
    }
}
