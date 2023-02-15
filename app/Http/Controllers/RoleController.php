<?php

namespace App\Http\Controllers;

use App\Models\Adminrole;
use Illuminate\Http\Request;
use App\Models\ExceptionPlaceholder;

class RoleController extends Controller
{
    public function addData(Request $request)
    {

        try {
            $input = $request->all();
            $adminrole = new Adminrole;
            $adminrole->name = $input['name'];   
            $adminrole->permission = json_encode($input['permission'],);
            $adminrole->save();
            return response()->json($adminrole);
        }
        catch(\Exception $exception) {
            return response()->json($exception);  
            }
            
    }
    public function showRole(Request $request)
    {
        try {
            $input = $request->all();
            $adminrole = Adminrole::orderBy('id', 'DESC')->where('active','1')->get();
            return response()->json($adminrole);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }

    public function store(Request $request)
    {
        try {
          
            $adminrole = Adminrole ::get();
            return response()->json($adminrole);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }

    public function get_input(Request $request)
    {
        try {
            $input = $request->all();
            $adminrole = Adminrole::where('id', $input['id'])->where('active','1')->get();
            // dd($adminrole);
            return response()->json($adminrole);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }

    public function update(Request $request)
    {
        try {

            $input = $request->all();
            $adminrole =Adminrole::find($input['id']);
            $adminrole->name = $input['name'];
            $adminrole->permission =($input['permission']);
            
            $adminrole->save();
            return response()->json($adminrole);
        }
        catch (\Exception $exception) {
           return response()->json($exception);
       } 
    }

    public function destroy(Request $request)
    {
        try {
            $input = $request->all();
            $adminrole = Adminrole::find($input['adminrole_id']);     
            $adminrole->active = 0;
            // $adminrole->role = 0;
            $adminrole->save();
            return response()->json($adminrole);
        }
         catch (\Exception $exception) {
            return response()->json($exception);
        }
    }
}

