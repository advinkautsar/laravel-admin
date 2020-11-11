<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Task;
use App\kategori;
use App\jabatan;

use Illuminate\Http\Request;
class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagename = 'Data Jabatan';
        $data=jabatan::all();
        return view('admin.jabatan.index', compact('data','pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_jabatan = jabatan::all();
        $pagename = 'Form Input Jabatan';
        return view('admin.jabatan.create', compact('pagename','data_jabatan'));
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
        $request->validate([
            'txt_kodejabatan'=> 'required',
            'txt_namajabatan'=> 'required',
            'txt_gaji'=> 'required',
        ]);

        $data_jabatan= new Jabatan([

            'kode_jabatan'=>$request->get('txt_kodejabatan'),
            'nama_jabatan'=>$request->get('txt_namajabatan'),
            'gaji'=>$request->get('txt_gaji'),
        ]);

        $data_jabatan->save();
        return redirect('admin/jabatan')->with('sukses','Jabatan Berhasil Ditambahkan');
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