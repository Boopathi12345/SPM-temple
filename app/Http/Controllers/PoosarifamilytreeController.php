<?php

namespace App\Http\Controllers;

use App\Models\Poosarifamilytree;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use App\Mail\MailPage;

class PoosarifamilytreeController extends Controller
{

    public function create(Request $request)
    {
        try {
           
        $input = $request->all();
        $user = new Poosarifamilytree;
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
            $destinationPath = public_path('/poosari');
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
          
            $poosari = Poosarifamilytree::where('active','1')->get();
          
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
           
                $poosari = Poosarifamilytree::where('active','1')->where('id',$input['user_id'])->get();
           
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
            $user = Poosarifamilytree::find($input['user_id']);
          
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
            $destinationPath = public_path('/poosari');
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
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDetails  $userDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
           
            $input = $request->all();
            $user = Poosarifamilytree::find($input['user_id']);     
            $user->active = 0;
            $user->save();
            return response()->json($user);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }



}
