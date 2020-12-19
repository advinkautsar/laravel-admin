<?php

namespace App\Http\Controllers\API\Kader;

use App\Http\Controllers\Controller;
use App\Kader;
use App\Posyandu;
use Illuminate\Http\Request;

class KaderController extends Controller
{
    public function getAll()
    {
        $data = Kader::orderBy('id','desc')
                ->get();
        return response()->json($data, 200);
    }



    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id'            => 'required',
            'nama_kader'    => 'required',
            'alamat_kader'   => 'required',
            'telp_kader'   => 'required',
            'password'   => 'required',
            'posyandu_id'   => 'required',


        ]);

        $data = new Kader;
        $data->id = $request->id;
        $data->nama_kader=$request->nama_kader;
        $data->alamat_kader=$request->alamat_kader;
        $data->telp_kader=$request->telp_kader;
        $data->password=$request->password;
        $data->posyandu_id=$request->posyandu_id;
        $data->save();

        return response()->json($data, 201);

    }

    public function update(Request $request)
    {
        $validateData=$request->validate([
            'id'            => 'required',
            'nama_kader'    => 'required',
            'alamat_kader'   => 'required',
            'telp_kader'   => 'required',
            'password'   => 'required',
            'posyandu_id'   => 'required',
        ]);

        $data = Kader::where('id','=', $request->id)->first();
        $data->id = $request->id;
        $data->nama_kader=$request->nama_kader;
        $data->alamat_kader=$request->alamat_kader;
        $data->telp_kader=$request->telp_kader;
        $data->password=$request->password;
        $data->posyandu_id=$request->posyandu_id;
        $data->save();

        return response()->json($data, 201);

    }

    public function destroy(Request $request)
    {
        $data = Kader::where('id','=', $request->id)->first();

        if(!empty($data)){
            $data->delete();
            return response()->json([
                'message' => 'Kader Berhasil Dihapus',
                'data yang terhapus adalah' => $data]
                , 200);
        }else{
            return response()->json([
                'error' => 'Data Tidak Ditemukan'
            ], 404);
            
        }
    }
}
