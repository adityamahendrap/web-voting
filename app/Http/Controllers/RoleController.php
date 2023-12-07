<?php

namespace App\Http\Controllers;

use App\Models\Role_model;
use App\Models\role;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        $mahasiswa = Mahasiswa::select('*', 'users.name AS name')
            ->join('users', 'users.id', '=', 'mahasiswas.user_id')
            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'mahasiswas.user_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')->orderBy('model_has_roles.role_id', 'ASC')->get();
        return view('/admin/role/index', compact('role', 'mahasiswa'));
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
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role_model $role_model)
    {
        $role_model->role_id = $request->role_id;
        $role_model->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
