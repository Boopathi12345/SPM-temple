<?php

namespace App\Http\Controllers;

use App\Models\Permisson;
use Illuminate\Http\Request;

class PermissonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function PermissonFullvalue(Request $request)
    {
        try {
            $input = $request->all();
            $permission = Permisson::where('active','1')->get();
            return response()->json($permission);
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
    public function create()
    {
        //
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
     * @param  \App\Models\Permisson  $permisson
     * @return \Illuminate\Http\Response
     */
    public function show(Permisson $permisson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permisson  $permisson
     * @return \Illuminate\Http\Response
     */
    public function edit(Permisson $permisson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permisson  $permisson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permisson $permisson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permisson  $permisson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permisson $permisson)
    {
        //
    }
}
