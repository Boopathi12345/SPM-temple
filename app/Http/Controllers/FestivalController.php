<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class FestivalController extends Controller
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
            $festival = new Festival;
            $festival->title = $input['title'];
            $festival->description = $input['description']; 
            // dd($festival); 
            $festival->date = $input['date']; 
            $festival->time = $input['time'];
            $festival->html_code = $input['addediter'];
            // dd($input['addediter']);
            // dd($festival); 
                $files = [];
                if($request->hasfile('photo'))
                {
                   foreach($request->file('photo') as $file)
                   {
                       $name = time().rand(1,100).'.'.$file->extension();
                       $file->move(public_path('festival'), $name);  
                       $files[] = $name;  
                   }
                }
                
            $festival->video = implode(" /",$files);
            $festival->save();
            return response()->json($festival);
        }
        catch (\Exception $exception) {
           return response()->json($exception);
       }



    }

   
    public function show(Request $request)
    {
        try {
            $input = $request->all();
            $festival = Festival::orderBy('id', 'DESC')->where('active','1')->get();
            // dd($festival);
            return response()->json($festival);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function check(Request $request)
    {
        try {
            $input = $request->all();
            $festival = Festival::where('id', $input['id'])->where('active','1')->get();
            // dd($festival);
            return response()->json($festival);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function update(Request $request)
    {
        try {

            $input = $request->all();
            $festival =Festival::find($input['id']);
            $festival->title = $input['title'];
            $festival->description = $input['description']; 
            // dd($festival); 
            $festival->date = $input['date']; 
            $festival->time = $input['time'];
            $festival->html_code = $input['addediter'];
            // dd($festival); 
                $files = [];
                if($request->hasfile('newphoto'))
                {
                   foreach($request->file('newphoto') as $file)
                   {
                       $name = time().rand(1,100).'.'.$file->extension();
                       $file->move(public_path('festival'), $name);  
                       $files[] = $name;  
                   }
                }
               
                
                if($request->hasfile('newphoto')){
                   
                    if(!empty($input['oldphoto'])){
                        $newvideo = implode(" /",$files);
                        $oldvideo=implode(" /",$input['oldphoto']);
                        $videovalue=$oldvideo." /".$newvideo;
                        $festival->video = $videovalue;
                        // dd($videovalue);
                    }else{
                        $newvideo = implode(" /",$files);
                        $festival->video = $newvideo;
                        // dd($newvideo);
                    }
                }

            
          
            
            // dd($festival);
            $festival->save();
            return response()->json($festival);
        }
        catch (\Exception $exception) {
           return response()->json($exception);
       } 
    }

    public function destroy(Request $request)
    {
        try {
            $input = $request->all();
            $user = Festival::find($input['user_id']);     
            $user->active = 0;
            // $user->role = 0;
            $user->save();
            return response()->json($user);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
  
    public function festival_view_page($id)
    {
        // $decode=base64_decode($id);
        $form = Festival::where('id',$id)->first();
        return view("frontend_view.festivaldetail_page", ["form"=>$form]);
    }
}
