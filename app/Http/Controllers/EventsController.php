<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function create(Request $request)
    {
        try {

            $input = $request->all();
            $events = new Events;
            $events->title = $input['title'];
            $events->description = $input['description']; 
            // dd($events); 
            $events->date = $input['date']; 
            $events->time = $input['time'];
            $events->html_code = $input['addediter'];
            $events->festival_id = $input['festival_id'];

            // dd($events); 
                $files = [];
                if($request->hasfile('photo'))
                {
                   foreach($request->file('photo') as $file)
                   {
                       $name = time().rand(1,100).'.'.$file->extension();
                       $file->move(public_path('events'), $name);  
                       $files[] = $name;  
                   }
                }
                
            $events->video = implode(" /",$files);
            $events->save();
            return response()->json($events);
        }
        catch (\Exception $exception) {
           return response()->json($exception);
       }



    }

   
    public function show(Request $request)
    {
        try {
            $input = $request->all();
            $events = Events::orderBy('id', 'DESC')->where('event.active','1')
            ->join('festival','festival.id','=','event.festival_id')
            ->select('event.*','festival.title as festival')
            ->get();
            // dd($events);
            return response()->json($events);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function check(Request $request)
    {
        try {
            $input = $request->all();
            $events = Events::where('id', $input['id'])->where('active','1')->get();
            // dd($events);
            return response()->json($events);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function update(Request $request)
    {
        try {

            $input = $request->all();
            $events =Events::find($input['id']);
            $events->title = $input['title'];
            $events->description = $input['description']; 
            // dd($events); 
            $events->date = $input['date']; 
            $events->time = $input['time'];
            $events->html_code = $input['addediter'];
            $events->festival_id = $input['festival_id'];
            // dd($events); 
                $files = [];
                if($request->hasfile('newphoto'))
                {
                   foreach($request->file('newphoto') as $file)
                   {
                       $name = time().rand(1,100).'.'.$file->extension();
                       $file->move(public_path('events'), $name);  
                       $files[] = $name;  
                   }
                }
          
                if($request->hasfile('newphoto')){
                   
                    if(!empty($input['oldphoto'])){
                        $newvideo = implode(" /",$files);
                        $oldvideo=implode(" /",$input['oldphoto']);
                        $videovalue=$oldvideo." /".$newvideo;
                        $events->video = $videovalue;
                        // dd($videovalue);
                    }else{
                        $newvideo = implode(" /",$files);
                        $events->video = $newvideo;
                        // dd($newvideo);
                    }
                }

            // dd($events);
            $events->save();
            return response()->json($events);
        }
        catch (\Exception $exception) {
           return response()->json($exception);
       } 
    }

    public function destroy(Request $request)
    {
        try {
            $input = $request->all();
            $user = Events::find($input['user_id']);     
            $user->active = 0;
            // $user->role = 0;
            $user->save();
            return response()->json($user);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
    public function events_view_page($id)
    {
        // $decode=base64_decode($id);
        $events = Events::where('id',$id)->first();
        // dd($events->id);
        $form = Events::where('event.id',$events->id)
        ->join('festival','festival.id','=','event.festival_id')
        ->select('event.*','festival.title as fetitle','festival.description as fedescripion','festival.video as fevideo','festival.date as fedate','festival.time as fetime')
        ->first();
        // echo($form);
        return view("frontend_view.eventsdetail_page", ["form"=>$form]);
    }
}
