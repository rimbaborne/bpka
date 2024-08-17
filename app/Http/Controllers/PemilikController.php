<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use App\Models\Lahan;
use App\Imports\LahansImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class PemilikController extends Controller
{
    public function index()
    {
        $pemiliks = Pemilik::with('lahan')->get();
        return response()->json($pemiliks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string',
            'alamat' => 'required|string',
            'ibu_kandung' => 'required|string',
            'nomor_telepon' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $pemilik = Pemilik::create($request->all());
        return response()->json($pemilik, 201);
    }

    public function show($id)
    {
        $pemilik = Pemilik::with('lahan')->findOrFail($id);
        return response()->json($pemilik);
    }

    public function update(Request $request, $id)
    {
        $pemilik = Pemilik::findOrFail($id);
        $request->validate([
            'nama' => 'string',
            'nik' => 'string',
            'alamat' => 'string',
            'ibu_kandung' => 'string',
            'nomor_telepon' => 'string',
            'user_id' => 'exists:users,id',
        ]);

        $pemilik->update($request->all());
        return response()->json($pemilik);
    }

    public function destroy($id)
    {
        $pemilik = Pemilik::findOrFail($id);
        $pemilik->delete();
        return response()->json(null, 204);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx',
        ]);

        // Lakukan impor menggunakan LahansImport dan passing user_id ke dalamnya
        Excel::import(new LahansImport($request->user_id), $request->file('file'));

        // Redirect atau kembalikan respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Data berhasil diimpor.');
    }
}

