<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class ApiController extends Controller
{
    public function tugas()
    {
        $tugas = Task::all();

        return response()->json([
                'message' => "Succes",
                'data' => $tugas
        ]);
    }
}
