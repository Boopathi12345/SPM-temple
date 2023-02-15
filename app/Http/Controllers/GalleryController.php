<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
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
            $gallery = new Gallery;
            $gallery->title = $input['title'];
            $gallery->description = $input['description']; 
            // dd($gallery); 
            $gallery->date = $input['date']; 
            // $gallery->time = $input['time'];
            // dd($gallery); 
                $files = [];
                if($request->hasfile('photo'))
                {
                   foreach($request->file('photo') as $file)
                   {
                       $name = time().rand(1,100).'.'.$file->extension();
                       $file->move(public_path('gallery'), $name);  
                       $files[] = $name;  
                   }
                }
                
            $gallery->photo = implode(" /",$files);
            $gallery->save();
            return response()->json($gallery);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try {
            $input = $request->all();
            $gallery = Gallery::orderBy('id', 'DESC')->where('active','1')->get();
            // dd($gallery);
            return response()->json($gallery);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function check(Request $request)
    {
        try {
            $input = $request->all();
            $gallery = Gallery::where('id', $input['id'])->where('active','1')->get();
            // dd($gallery);
            return response()->json($gallery);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
   

    public function update(Request $request)
    {
        try {

            $input = $request->all();
            $gallery =Gallery::find($input['id']);
            $gallery->title = $input['title'];
            $gallery->description = $input['description']; 
            // dd($gallery); 
            $gallery->date = $input['date']; 
            // dd($gallery); 
                $files = [];
                if($request->hasfile('newphoto'))
                {
                   foreach($request->file('newphoto') as $file)
                   {
                       $name = time().rand(1,100).'.'.$file->extension();
                       $file->move(public_path('gallery'), $name);  
                       $files[] = $name;  
                   }
                }
               
                
                if($request->hasfile('newphoto')){
                   
                    if(!empty($input['oldphoto'])){
                        $newphoto = implode(" /",$files);
                        $oldphoto=implode(" /",$input['oldphoto']);
                        $photovalue=$oldphoto." /".$newphoto;
                        $gallery->photo = $photovalue;
                        // dd($photovalue);
                    }else{
                        $newphoto = implode(" /",$files);
                        $gallery->photo = $photovalue;
                        // dd($newphoto);
                    }
                }

            
          
            
            // dd($festival);
            $gallery->save();
            return response()->json($gallery);
        }
        catch (\Exception $exception) {
           return response()->json($exception);
       } 
    }

    public function destroy(Request $request)
    {
        try {
            $input = $request->all();
            $user = Gallery::find($input['user_id']);     
            $user->active = 0;
            // $user->role = 0;
            $user->save();
            return response()->json($user);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
   
   
}
