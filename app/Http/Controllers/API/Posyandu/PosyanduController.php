<?php

namespace App\Http\Controllers\API\Posyandu;

use App\Http\Controllers\Controller;
use App\Posyandu;
use Illuminate\Http\Request;

class PosyanduController extends Controller
{
    public function getAll()
    {
        $data = Posyandu::orderBy('id','desc')
                ->get();
        return response()->json($data, 200);
    }



    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id'            => 'required',
            'nama_posyandu'    => 'required',
            'alamat_posyandu'   => 'required',
        ]);

        $data = new Posyandu;
        $data->id = $request->id;
        $data->nama_posyandu=$request->nama_posyandu;
        $data->alamat_posyandu=$request->alamat_posyandu;
        $data->save();

        return response()->json($data, 201);

    }

    public function update(Request $request)
    {
        $validateData=$request->validate([
            'id'            => 'required',
            'nama_posyandu'    => 'required',
            'alamat_posyandu'   => 'required',
        ]);

        $data = Posyandu::where('id','=', $request->id)->first();
        $data->id = $request->id;
        $data->nama_posyandu=$request->nama_posyandu;
        $data->alamat_posyandu=$request->alamat_posyandu;
        $data->save();

        return response()->json($data, 201);

    }

    public function destroy(Request $request)
    {
        $data = Posyandu::where('id','=', $request->id)->first();

        if(!empty($data)){
            $data->delete();
            return response()->json([
                'message' => 'Posyandu Berhasil Dihapus',
                'data yang terhapus adalah' => $data]
                , 200);
        }else{
            return response()->json([
                'error' => 'Data Tidak Ditemukan'
            ], 404);
            
        }
    }
}
