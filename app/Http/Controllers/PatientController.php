<?php

namespace App\Http\Controllers;

use App\Models\Patient; 
use App\Models\Payment; 
use App\Models\Revenue;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class PatientController extends Controller
{
    function index()
    {
        $patients=Patient::all();   
        return view('Patient.index',compact("patients"));
    }

    function show($id)
    {
      $patient=Patient::find($id);
   
      return view('Patient.show',compact("patient"));
    }

    function create()
    {
       return view('Patient.create');
    }

    function store( Request $request)
    { 
        $validator = Validator::make($request->all(), [
            'Name' => 'required|unique:patient,name|min:3',
            'Phone' => 'required|unique:patient',
            'Date' => 'required',
            'Payment' => 'required|in:Cash,Insurance',
            'Total_Session' => 'required|integer',
            'Session_Number' => 'required|integer',
            'Total_Amount' => 'required|numeric',
            'Discount' => 'nullable|numeric|min:0|max:100',
        ],[
            'Name.unique' => "This patient name already exists",
            'Name.min' => "patient name must be at least 3 characters",
            'Phone.unique' => "This patient name already exists",
            'Phone.required' => 'Phone is required',
            'Date.required' => 'Date is required',
            'Payment.in' => 'Payment method must be either Cash or Insurance',
            'Total_Session.required' => 'Total sessions is required',
            'Session_Number.required' => 'Session number is required',
            'Total_Amount.required' => 'Total amount is required',
            'Discount.numeric' => 'Discount must be a number',
            'Discount.min' => 'Discount must be at least 0',
            'Discount.max' => 'Discount must not exceed 100',
        ]);
    
  
        $totalAmount = $request->Total_Amount;
        $discount = $request->Discount ? ($totalAmount * ($request->Discount / 100)) : 0;
        $finalAmount = $totalAmount - $discount;

        $patient = Patient::create([
       'Name' => $request->Name,
       'Date' => $request->Date,
       'Phone' => $request->Phone,
       'Payment' => $request->Payment,
       'Recommended' => $request->Recommended,
       'Total_Session' => $request->Total_Session,
       'Session_Number' => $request->Session_Number,
       'Total_Amount' => $finalAmount,
       'Discount' => $request->Discount,
       'Total_Payment' => $finalAmount,  

      ]);


        $patient->payments()->create([
        'amount' => $finalAmount,
        'payment_method' => $request->Payment,
        'discount' => $request->Discount,
        'payment_date' => $request->Date, 
    ]);


        Revenue::create([
            'Date' => $request->Date,
            'Total_Payment' => $finalAmount,
            'Total_Discount' => $request->Discount,
        ]);

       return to_route('Patient.index');
    }


    public function showPayments($id)
    {
        $patient = Patient::findOrFail($id);
        $payments = $patient->payments()->get();
        
        return view('Patient.payments', compact('patient', 'payments'));
    }

    
    function edit($id)
    {
       $patient=Patient::findOrFail($id);
       return view('Patient.edit',compact("patient"));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required|unique:patient,name|min:3',
            'Phone' => 'required|unique:patient',
            'Date' => 'required',
            'Payment' => 'required|in:Cash,Insurance',
            'Total_Session' => 'required|integer',
            'Session_Number' => 'required|integer',
            'Total_Amount' => 'required|numeric',
            'Discount' => 'nullable|numeric|min:0|max:100',
    
        ],[
            'Name.unique' => "This patient name already exists",
            'Name.min' => "patient name must be at least 3 characters",
            'Phone.unique' => "This patient name already exists",
            'Phone.required' => 'Phone is required',
            'Date.required' => 'Date is required',
            'Payment.in' => 'Payment method must be either Cash or Insurance',
            'Total_Session.required' => 'Total sessions is required',
            'Session_Number.required' => 'Session number is required',
            'Total_Amount.required' => 'Total amount is required',
            'Discount.numeric' => 'Discount must be a number',
            'Discount.min' => 'Discount must be at least 0',
            'Discount.max' => 'Discount must not exceed 100',
        ]);


        $patient = Patient::findOrFail($id);

        $finalAmount = $patient->calculateFinalAmount($request->Total_Amount, $request->Discount);
    
        // Update the patient's Total_Amount
        $patient->Total_Amount = $finalAmount;
    
        // Update Total_Payment using the model method
        $patient->updateTotalPayment($finalAmount);

        $patient->update([
            'Name' => $request->Name,
            'Date' => $request->Date,
            'Phone' => $request->Phone,
            'Payment' => $request->Payment,
            'Recommended' => $request->Recommended,
            'Total_Session' => $request->Total_Session,
            'Session_Number' => $request->Session_Number,
            'Total_Amount' => $finalAmount,
            'Discount' => $request->Discount, 
        ]);
        $patient->payments()->create([
            'amount' => $finalAmount,
            'payment_method' => $request->Payment,
            'discount' => $request->Discount,
            'payment_date' => $request->Date,
        ]);
        $patient->save();
        

            // Update or create revenue record
        Revenue::updateOrCreate(
        ['Date' => $request->Date],
        [
            'Total_Payment' => $finalAmount,
            'Total_Discount' => $request->Discount ? ($finalAmount * ($request->Discount / 100)) : 0,
        ]
    );
    
        return redirect()->route('Patient.index');
    }
    
    public function destroy($id)
    {
    $patient = Patient::findOrFail($id);
    $patient->delete();
    return redirect()->route('Patient.index')->with('success', 'Patient Data Deleted Successfully');
    }
    public function search(Request $request)
{
    $searchTerm = $request->input('search'); 

   
    $patients = Patient::where('Name', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('Phone', 'LIKE', '%' . $searchTerm . '%')
                        ->get();

    return view('Patient.index', compact('patients'));
}

}
