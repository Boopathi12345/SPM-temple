<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
class UserDetailsController extends Controller
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
        $user = new UserDetails;
        $user->name = $input['formValidationName'];
        // dd( $input['formValidationName']);
        $user->last_name =$input['formValidationLast'];
        $user->email= $input['formValidationEmail'];    
        $user->password= Hash::make($input['formValidationConfirmPass']);
        $user->father_name= $input['formValidationFather'];
         $user->gender= $input['formValidationGender']; 
         $user->user_type= $input['formValidationSelect2']; 
       
         $user->phone= $input['formValidationPhone'];
         $user->dob= $input['formValidationDob'];
         $user->role= $input['formValidationPermission'];
         $user->address= $input['formValidationAddress'];
         $user->city= $input['formValidationCity'];
         $user->state= $input['formValidationState'];
        // dd($user);
        
        //  $user->photo= $input['photo'];
        //  $user->created_by= $input['creater_id'];
         if ($image = $request->file('photo')) {
            $onimage = $request->file('photo');
            $onimage_name = time().'1.'.$onimage->getClientOriginalExtension();
            $destinationPath = public_path('/images');
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

    public function GetUserData($id)
    {
        // $decode=base64_decode($id);
        $form = UserDetails::where('id',$id)->first();
        return view("edituser", ["form"=>$form]);
    }
    public function ProfileData($id)
    {
        // $decode=base64_decode($id);
        $form = UserDetails::where('id',$id)->first();
        return view("profile", ["form"=>$form]);
    }

    public function update(Request $request)
    {
        try {
            $input = $request->all();
            $user = UserDetails::find($input['userid']);
            $user->name = $input['formValidationName'];
           
            $user->last_name =$input['formValidationLast'];
            $user->email= $input['formValidationEmail'];  
            
            if($input['formValidationConfirmPass']){
            $user->password= Hash::make($input['formValidationConfirmPass']);
        }
      
            $user->father_name= $input['formValidationFather'];
           
             $user->gender= $input['formValidationGender']; 
           
             $user->user_type= $input['formValidationSelect2']; 
            
             $user->phone= $input['formValidationPhone'];
             $user->dob= $input['formValidationDob'];
             $user->role= $input['formValidationPermission'];
             $user->address= $input['formValidationAddress'];
             $user->city= $input['formValidationCity'];
             $user->state= $input['formValidationState'];
           
            
        //   if($input['old_photo']){}else{
             if ($image = $request->file('photo')) {
                $onimage = $request->file('photo');
                $onimage_name = time().'1.'.$onimage->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $onimage->move($destinationPath,$onimage_name);
                $user->photo = $onimage_name;
            }
        // }
            $user->save();
    
           
            return response()->json($user);
        }
        catch (\Exception $exception) {
           return response()->json($exception);
       }
    }
    public function Emailchecking(Request $request)
    {
        try {
            $input = $request->all();
            $expenses = UserDetails::where('email',$input['email'])->get();
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
    public function ActiveUserValue(Request $request)
    {
        try {
            $input = $request->all();
            if($input['user_id']=='all'){
                $user = UserDetails::orderBy('id', 'DESC')->get();
            }else{
            $user = UserDetails::orderBy('id', 'DESC')->where('active',$input['user_id'])->get();
            }
            return response()->json($user);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }

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
            $user = UserDetails::find($input['user_id']);     
            $user->active = 0;
            // $user->role = 0;
            $user->save();
            return response()->json($user);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }

    public function INActiveUser(Request $request)
    {
        try {
            $input = $request->all();
            $user = UserDetails::find($input['user_id']);     
            $user->active = 1;
            // $user->role = 0;
            $user->save();
            return response()->json($user);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }

    public function Nologinuser(Request $request)
    {
        try {
            $input = $request->all();
            $expenses = UserDetails::where('email',$input['email'])->where('active','0')->get();
            return response()->json($expenses);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDetails  $userDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDetails $userDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDetails  $userDetails
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDetails  $userDetails
     * @return \Illuminate\Http\Response
     */
   
}
