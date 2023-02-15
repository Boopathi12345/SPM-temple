<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function create(Request $request)
    {
        try {
            $input = $request->all();
            $expenses = new Expenses;
            $expenses->name = $input['name']; 
            $expenses->description = $input['description']; 
            $expenses->date= $input['date']; 
            $expenses->amount= $input['amount']; 
              $expenses->save();
            return response()->json($expenses);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function update(Request $request)
    {
        try {
            $input = $request->all();
            $expenses = Expenses::find($input['id']);
            $expenses->name = $input['name']; 
            $expenses->description = $input['description']; 
            $expenses->date= $input['date']; 
            $expenses->amount= $input['amount']; 
            $expenses->save();
            return response()->json($expenses);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function show(Request $request)
    {
        try {
          
           
            $expenses = Expenses::orderBy('id','DESC')->where('active','1')->get();
            return response()->json($expenses);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function editshowvalue(Request $request)
    {
        try {
            $input = $request->all();
            $expenses = Expenses::where('active','1')->where('id',$input['id'])->get();
            return response()->json($expenses);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function destroy(Request $request)
    {
        try {
            $input = $request->all();
            $expenses = Expenses::find($input['id']);     
            $expenses->active = 0;
            $expenses->save();
            return response()->json($expenses);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenses $expenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
  
}
