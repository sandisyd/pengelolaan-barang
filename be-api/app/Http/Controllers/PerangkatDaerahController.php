<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDaerah;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PerangkatDaerahController extends Controller
{
    //
    public function index()
    {
        return response()->json([
            'message'=>'success',
            'data'=>PerangkatDaerah::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perangkat_daerah' => 'required|string|max:255',
        ]);

        $perangkatDaerah = PerangkatDaerah::create($validated);

        return response()->json([
            'message'=>'success',
            'data'=>$perangkatDaerah
        ], 201);
    }

    public function show($id)
    {
        $perangkatDaerah = PerangkatDaerah::find($id);

        if (!$perangkatDaerah) {
            return response()->json([
                'message'=>'not found'
            ], 404);
        }

        return response()->json([
            'message'=>'success',
            'data'=>$perangkatDaerah
        ]);
    }

    public function update(Request $request, string $id)
    {
        $perangkatDaerah = PerangkatDaerah::find($id);

        if (!$perangkatDaerah) {
            return response()->json([
                'message'=>'not found'
            ], 404);
        }

        $validated = $request->validate([
            'nama_perangkat_daerah' => 'required|string|max:255',
        ]);

        $perangkatDaerah->update($validated);

        return response()->json([
            'message'=>'updated success',
            'data'=>$perangkatDaerah
        ],200);
    }

    public function destroy(string $id)
    {
        $perangkatDaerah = PerangkatDaerah::find($id);

        if (!$perangkatDaerah) {
            return response()->json([
                'message'=>'not found'
            ], 404);
        }

        $perangkatDaerah->delete();

        return response()->json([
            'message'=>'deleted success'
        ],200);
    }
}
