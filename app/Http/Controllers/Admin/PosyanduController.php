<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Posyandu;
use App\Kader;
use Illuminate\Http\Request;

class PosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename = 'Data Posyandu';
        $data_kader = Kader::all();
        $data = Posyandu::all();
        return view('admin.posyandu.index', compact('data','pagename','data_kader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data_kategori = kategori::all();
        $pagename = 'Form Input Posyandu';
        return view('admin.posyandu.create', compact('pagename'));
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
            'txt_namaposyandu'=> 'required',
            'txt_alamatposyandu'=> 'required',
        ]);

        $data_posyandu = new Posyandu([

            'nama_posyandu'=>$request->get('txt_namaposyandu'),
            'alamat_posyandu'=>$request->get('txt_alamatposyandu'),
        ]);

        $data_posyandu->save();
        return redirect('admin/posyandu')->with('sukses','Posyandu Berhasil Ditambahkan');
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
        // $data_kategori = kategori::all();
        $pagename = 'Edit Posyandu';
        $data = Posyandu::find($id);
        return view('admin.posyandu.edit', compact('data','pagename'));
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
            'txt_namaposyandu'=> 'required',
            'txt_alamatposyandu'=> 'required',
        ]);

            $posyandu = Posyandu::find($id);

            $posyandu->nama_posyandu = $request->get('txt_namaposyandu');
            $posyandu->alamat_posyandu= $request->get('txt_alamatposyandu');
      

        $posyandu->save();
        return redirect('admin/posyandu')->with('sukses','Posyandu Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posyandu=Posyandu::find($id);
        $posyandu->delete();
        return redirect('admin/posyandu')->with('sukses','Data Posyandu Berhasil Dihapus');
    }
}
