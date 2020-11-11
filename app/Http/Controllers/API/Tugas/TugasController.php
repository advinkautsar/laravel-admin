<?php

namespace App\Http\Controllers\API\Tugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;

class TugasController extends Controller
{
    public function getAll()
    {
        $data = Task::orderBy('id','desc')
                ->get();
        return response()->json($data, 200);
    }



    public function store(Request $request)
    {
        $validateData->$request->validate([
            'id'            => 'required',
            'nama_tugas'    => 'required',
            'id_kategori'   => 'required',
            'ket_tugas'     => 'required',
            'status_tugas'  => 'required',
        ]);

        $data = new Task;
        $data->id = $request->id;
        $data->nama_tugas=$request->nama_tugas;
        $data->id_kategori=$request->id_kategori;
        $data->ket_tugas=$request->ket_tugas;
        $data->status_tugas=$request->status_tugas;
        $data->save();

        return response()->json($data, 201);

    }

    public function update(Request $request)
    {
        $validateData->$request->validate([
            'id'            => 'required',
            'nama_tugas'    => 'required',
            'id_kategori'   => 'required',
            'ket_tugas'     => 'required',
            'status_tugas'  => 'required',
        ]);

        $data = Task::where('id','=', $request->id)->first();
        $data->id = $request->id;
        $data->nama_tugas=$request->nama_tugas;
        $data->id_kategori=$request->id_kategori;
        $data->ket_tugas=$request->ket_tugas;
        $data->status_tugas=$request->status_tugas;
        $data->save();

        return response()->json($data, 201);

    }

    public function destroy(Request $request)
    {
        $data = Task::where('id','=', $request->id)->first();

        if(!empty($data)){
            $data->detelet();
            return response()->json($data, 200);
        }else{
            return response()->json([
                'error' => 'Data Tidak Ditemukan'
            ], 404);
            
        }
    }
}
