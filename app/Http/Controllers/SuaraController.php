<?php

namespace App\Http\Controllers;

use App\Models\Suara;
use Illuminate\Http\Request;

class SuaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suara = Suara::all();
        return view('suara', ['suara' => $suara]);
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
     * @param  \App\Models\Suara  $suara
     * @return \Illuminate\Http\Response
     */
    public function show(Suara $suara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suara  $suara
     * @return \Illuminate\Http\Response
     */
    public function edit(Suara $suara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suara  $suara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suara $suara)
    {
        $this->validate($request, [
            'calon' => 'required',
        ]);

        $suara->calon_id = $request->calon;
        $suara->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suara  $suara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suara $suara)
    {
        $suara->delete();
        return redirect('/suara');
    }
}
