<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
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
            $blog = new Blog;
            $blog->title = $input['title'];
            $blog->description = $input['description']; 
            // dd($blog); 
            $blog->date = $input['date']; 
            $blog->time = $input['time'];
            $blog->html_code = $input['addediter'];
            // dd($blog); 
                $files = [];
                if($request->hasfile('photo'))
                {
                   foreach($request->file('photo') as $file)
                   {
                       $name = time().rand(1,200).'.'.$file->extension();
                       $file->move(public_path('blog'), $name);  
                       $files[] = $name;  
                   }
                }
                
            $blog->video = implode(" /",$files);
            $blog->save();
            return response()->json($blog);
        }
        catch (\Exception $exception) {
           return response()->json($exception);
       }



    }

   
    public function show(Request $request)
    {
        try {
            $input = $request->all();
            $blog = Blog::orderBy('id', 'DESC')->where('active','1')->get();
            // dd($blog);
            return response()->json($blog);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function check(Request $request)
    {
        try {
            $input = $request->all();
            $blog = Blog::where('id', $input['id'])->where('active','1')->get();
            // dd($blog);
            return response()->json($blog);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function update(Request $request)
    {
        try {

            $input = $request->all();
            $blog =Blog::find($input['id']);
            $blog->title = $input['title'];
            $blog->description = $input['description']; 
            // dd($blog); 
            $blog->date = $input['date']; 
            $blog->time = $input['time'];
            $blog->html_code = $input['addediter'];
            // dd($blog); 
                $files = [];
                if($request->hasfile('newphoto'))
                {
                   foreach($request->file('newphoto') as $file)
                   {
                       $name = time().rand(1,100).'.'.$file->extension();
                       $file->move(public_path('blog'), $name);  
                       $files[] = $name;  
                   }
                }
               
                
                if($request->hasfile('newphoto')){
                   
                    if(!empty($input['oldphoto'])){
                        $newvideo = implode(" /",$files);
                        $oldvideo=implode(" /",$input['oldphoto']);
                        $videovalue=$oldvideo." /".$newvideo;
                        $blog->video = $videovalue;
                        // dd($videovalue);
                    }else{
                        $newvideo = implode(" /",$files);
                        $blog->video = $newvideo;
                        // dd($newvideo);
                    }
                }

            
          
            
            // dd($blog);
            $blog->save();
            return response()->json($blog);
        }
        catch (\Exception $exception) {
           return response()->json($exception);
       } 
    }

    public function destroy(Request $request)
    {
        try {
            $input = $request->all();
            $user = Blog::find($input['user_id']);     
            $user->active = 0;
            // $user->role = 0;
            $user->save();
            return response()->json($user);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function blog_view_page($id)
    {
        // $decode=base64_decode($id);
        $form = Blog::where('id',$id)->first();
        return view("frontend_view.blogdetail_page", ["form"=>$form]);
    }
   
}
