<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use\App\Posyandu;
use\App\Kader;
use Illuminate\Http\Request;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename = 'Data Kader';
        $data_posyandu = Posyandu::all();
        $data = Kader::all();
        return view('admin.kader.index', compact('data','pagename','data_posyandu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_posyandu = Posyandu::all();
        $pagename = 'Form Input Kader';
        return view('admin.kader.create', compact('pagename','data_posyandu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'txt_namakader'=> 'required',
            'txt_alamatkader'=> 'required',
            'txt_telpkader'=> 'required',
            'txt_passwordkader'=> 'required',
            'optionid_posyandu'=> 'required',
            
        ]);

        $data_kader = new Kader([

            'nama_kader'=>$request->get('txt_namakader'),
            'alamat_kader'=>$request->get('txt_alamatkader'),
            'telp_kader'=>$request->get('txt_telpkader'),
            'password'=>$request->get('txt_passwordkader'),
            'posyandu_id'=>$request->get('optionid_posyandu'),

        ]);

        $data_kader->save();
        return redirect('admin/kader')->with('sukses','Kader Berhasil Ditambahkan');
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
        $data_posyandu = Posyandu::all();
        $pagename = 'Edit Kader';
        $data = Kader::find($id);
        return view('admin.kader.edit', compact('data_posyandu','data','pagename'));
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
        $request->validate([
            'txt_namakader'=> 'required',
            'txt_alamatkader'=> 'required',
            'txt_telpkader'=> 'required',
            'txt_passwordkader'=> 'required',
            'optionid_posyandu'=> 'required',
            
        ]);

        $kader = Kader::find($id);

            $kader->nama_kader = $request->get('txt_namakader');
            $kader->alamat_kader= $request->get('txt_alamatkader');
            $kader->telp_kader = $request->get('txt_telpkader');
            $kader->password= $request->get('txt_passwordkader');
            $kader->posyandu_id= $request->get('optionid_posyandu');

            $kader->save();
            return redirect('admin/kader')->with('sukses','Kader Berhasil Dirubah');
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
        $kader=Kader::find($id);
        $kader->delete();
        return redirect('admin/kader')->with('sukses','Kader Berhasil Dihapus');
    }
}
