<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {

            $input = $request->all();
            $payment = new Payment;
            $payment->name = $input['name'];
            $payment->father_name = $input['father_name'];  
            $payment->date = $input['date']; 
            $payment->amount = $input['amount'];
            $payment->address = $input['address'];
            $payment->number = $input['number']; 
            // dd($payment); 
            $payment->save();
            return response()->json($payment);
        }
        catch (\Exception $exception) {
           return response()->json($exception);
       }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    
    public function show(Request $request)
    {
        try {
            $input = $request->all();
            $payment = Payment::orderBy('id', 'DESC')->where('active','1')->get();
            // dd($payment);
            return response()->json($payment);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function check(Request $request)
    {
        try {
            $input = $request->all();
            $payment = Payment::where('id', $input['id'])->where('active','1')->get();
            // dd($payment);
            return response()->json($payment);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
     

    public function update(Request $request)
    {
        try {

            $input = $request->all();
            $payment =Payment::find($input['id']);
            $payment->name = $input['edit_name'];
            $payment->father_name = $input['edit_f_name'];
            $payment->amount = $input['edit_amount'];
            $payment->number = $input['edit_number']; 
            $payment->address = $input['edit_address'];
            // dd($payment); 
            $payment->save();
            return response()->json($payment);
        }
        catch (\Exception $exception) {
           return response()->json($exception);
       } 
    }

    public function destroy(Request $request)
    {
        try {
            $input = $request->all();
            $user = Payment::find($input['user_id']);     
            $user->active = 0;
            // $user->role = 0;
            $user->save();
            return response()->json($user);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function monthchart(Request $request)   
    {
    
    
    try {
    $input = $request->all();
    $monthchartData = [];
    $now = Carbon::now();
    // dd($now);
    // for($x = 1;$x <= 1;$x++){
        $paymentvalue=[];
        for($i = 1;$i <= $now->month;$i++){
        $payment =  Payment::whereMonth('created_at',$i)->where('active','1')->whereYear('created_at',date("Y"))->sum('amount');
        array_push($paymentvalue,$payment);
        }
        $expensesvalue=[];
        for($i = 1;$i <= $now->month;$i++){
        $expenses = DB::table('expenses')->whereMonth('created_at',$i)->whereYear('created_at',date("Y"))->where('active','1')->sum('amount');
        array_push($expensesvalue,$expenses);
        }
        $totalvalue=[];
        for($i = 1;$i <= $now->month;$i++){
            $payment_v =  Payment::whereMonth('created_at',$i)->whereYear('created_at',date("Y"))->where('active','1')->sum('amount');
            $expenses_v = DB::table('expenses')->whereMonth('created_at',$i)->whereYear('created_at',date("Y"))->where('active','1')->sum('amount');
            $total=$payment_v - $expenses_v;
            array_push($totalvalue,$total);
            }
       
       $monthvalue=[];
        for($i = 1;$i <= $now->month;$i++){
        $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
        array_push($monthvalue,$months[$i]);
        }
        $month_data['payment'] = $paymentvalue;
        $month_data['expenses'] = $expensesvalue;
        $month_data['total'] = $totalvalue;
        $month_data['months'] = $monthvalue;
        array_push($monthchartData,$month_data);
    // }
    // dd($monthchartData);
            return response()->json($monthchartData);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
       
    }
   
    public function DashboardCount(Request $request)   
    {
  try {
    $input = $request->all();
    $monthchartData = [];
    $now = Carbon::now();

    $totalvalue=[];
  if($input['value']){
                $payment_v =  Payment::whereYear('created_at',$input['value'])->where('active','1')->sum('amount');
                // dd( $payment_v);
                $expenses_v = DB::table('expenses')->whereYear('created_at',$input['value'])->where('active','1')->sum('amount');
                $total=$payment_v - $expenses_v;
                $month_data['payment'] = $payment_v;
        $month_data['expenses'] = $expenses_v;
        $month_data['total'] = $total;
        array_push($totalvalue,$month_data);
     }
               
            return response()->json($totalvalue);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }

}
