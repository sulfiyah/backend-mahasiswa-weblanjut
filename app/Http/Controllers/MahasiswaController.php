<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index() {
        return response()->json(Mahasiswa::all(), 200);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
        ]);

        $mahasiswa = Mahasiswa::create($validated);

        return response()->json([
            'message' => 'Data mahasiswa berhasil ditambahkan',
            'data' => $mahasiswa
        ], 201);
    }

    public function show($id) {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Data mahasiswa tidak ditemukan'], 404);
        }
        return response()->json($mahasiswa, 200);
    }

    public function update(Request $request, $id) {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Data mahasiswa tidak ditemukan'], 404);
        }
        $mahasiswa->update($request->all());
        return response()->json([
            'message' => 'Data mahasiswa berhasil diperbarui',
            'data' => $mahasiswa
        ], 200);
    }

    public function destroy($id) {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Data mahasiswa tidak ditemukan'], 404);
        }
        $mahasiswa->delete();
        return response()->json(['message' => 'Data mahasiswa berhasil dihapus'], 200);
    }
}