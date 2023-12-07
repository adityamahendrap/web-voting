<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['smft'] = DB::table('calons')
            ->select(DB::raw('count(suaras.id) as voted, calons.nama_panggilan'))
            ->leftJoin('suaras', 'calons.id', '=', 'suaras.calon_id')
            ->where('calons.jenis_calon', '=', 'SMFT')
            ->groupBy('calons.nama_panggilan')
            ->orderBy('voted', 'desc')
            ->get();

        $data['bpmft'] = DB::table('calons')
            ->select(DB::raw('count(suaras.id) as voted, calons.nama_panggilan'))
            ->leftJoin('suaras', 'calons.id', '=', 'suaras.calon_id')
            ->where('calons.jenis_calon', '=', 'BPMFT')
            ->groupBy('calons.nama_panggilan')
            ->orderBy('voted', 'desc')
            ->get();

        $data['jml_milih'] = Mahasiswa::where('status', 'voted')->get()->count();
        $data['jml_golput'] = Mahasiswa::where('status', 'terverifikasi')->get()->count();

        // dd($data);

        return view('admin/index', ['data' => $data]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
