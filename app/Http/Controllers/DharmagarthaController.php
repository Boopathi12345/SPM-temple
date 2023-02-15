<?php

namespace App\Http\Controllers;

use App\Models\Dharmagartha;
use Illuminate\Http\Request;

class DharmagarthaController extends Controller
{
    public function create(Request $request)
    {
        try {
           
        $input = $request->all();
        $user = new Dharmagartha;
        $user->name = $input['name'];
        $user->last_name =$input['last_name'];
        $user->email= $input['email'];    
        $user->father_name= $input['father_name'];
         $user->gender= $input['gender']; 
        $user->dob= $input['dob'];
        
         $user->address= $input['address'];
       
         $user->city= $input['city'];
         $user->state= $input['state'];
         $user->phone= $input['phone'];
         $user->child_number= $input['child_id'];
         
       
         if ($image = $request->file('photo')) {
            $onimage = $request->file('photo');
            $onimage_name = time().'1.'.$onimage->getClientOriginalExtension();
            $destinationPath = public_path('/dharmagartha');
            $onimage->move($destinationPath,$onimage_name);
            $user->photo = $onimage_name;
        }

        $user->save();

       
        return response()->json($user);
    }
    catch (\Exception $exception) {
       return response()->json($exception);
   }
    }

    public function show(Request $request)
    {
        try {
            $input = $request->all();
          
            $poosari = Dharmagartha::where('active','1')->get();
          
            // dd($poosari);
            return response()->json($poosari);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }

    public function editshowvalue(Request $request)
    {
        try {
            $input = $request->all();
           
                $poosari = Dharmagartha::where('active','1')->where('id',$input['user_id'])->get();
           
            // dd($poosari);
            return response()->json($poosari);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
   
    public function update(Request $request)
    {
        try {
            $input = $request->all();
            $user = Dharmagartha::find($input['user_id']);
          
        $user->name = $input['name'];
        $user->last_name =$input['last_name'];
        $user->email= $input['email'];    
        $user->father_name= $input['father_name'];
         $user->gender= $input['gender']; 
        $user->dob= $input['dob'];
        
         $user->address= $input['address'];
       
         $user->city= $input['city'];
         $user->state= $input['state'];
         $user->phone= $input['phone'];
        //  $user->child_number= $input['child_id'];
         
       
         if ($image = $request->file('photo')) {
            $onimage = $request->file('photo');
            $onimage_name = time().'1.'.$onimage->getClientOriginalExtension();
            $destinationPath = public_path('/dharmagartha');
            $onimage->move($destinationPath,$onimage_name);
            $user->photo = $onimage_name;
        }
        // dd($user);

        $user->save();

       
        return response()->json($user);
        }
        catch (\Exception $exception) {
           return response()->json($exception);
       }
    }
  
    public function destroy(Request $request)
    {
        try {
           
            $input = $request->all();
            $user = Dharmagartha::find($input['user_id']);     
            $user->active = 0;
            $user->save();
            return response()->json($user);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
}
