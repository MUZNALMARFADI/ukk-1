<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::paginate(10);
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:siswa',
            'nama' => 'required',
            'tingkat' => 'required|in:X,XI,XII',
            'jurusan' => 'required',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required|unique:siswa,nisn,' . $id,
            'nama' => 'required',
            'tingkat' => 'required|in:X,XI,XII',
            'jurusan' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();
        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}