<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlatMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    //Function to admin//
    public function data_alat(){
        return view('admin.dataAlat');
    }

    public function jenis_alat(){
        return view('admin.jenisAlat');
    }
    public function merk_alat(){
        return view('admin.merkAlat');
    }
    public function ruang_alat(){
        return view('admin.ruangAlat');
    }

    public function data_periksa(){
        return view('admin.dataPeriksa');
    }
    //---------------------------------------------------------------------- Function to user----------------------------------------------------------------------------------------------//
    public function data_alat_user(){
        return view('user.dataAlatuser');
    }

    public function jenis_alat_user(){
        return view('user.jenisAlatuser');
    }
    public function merk_alat_user(){
        return view('user.merkAlatuser');
    }
    public function ruang_alat_user(){
        return view('user.ruangAlatuser');
    }

    public function data_periksa_user(){
        return view('user.dataPeriksauser');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
