<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;

class SppController extends Controller
{
    // TAMPILKAN LIST SPP
    public function index()
    {
        $spp = Spp::orderBy('tahun', 'DESC')->paginate(10);
        return view('spp.index', compact('spp'));
    }

    // FORM TAMBAH SPP
    public function create()
    {
        return view('spp.create');
    }

    // SIMPAN SPP BARU
    public function store(Request $request)
    {
        $request->validate([
            'tahun'    => 'required',
            'kategori' => 'required',
            'nominal'  => 'required|numeric',
        ]);

        Spp::create([
            'tahun'    => $request->tahun,
            'kategori' => $request->kategori,
            'nominal'  => $request->nominal,
        ]);

        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $spp = Spp::findOrFail($id);
        return view('spp.edit', compact('spp'));
    }

    // UPDATE SPP
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun'    => 'required',
            'kategori' => 'required',
            'nominal'  => 'required|numeric',
        ]);

        $spp = Spp::findOrFail($id);

        $spp->update([
            'tahun'    => $request->tahun,
            'kategori' => $request->kategori,
            'nominal'  => $request->nominal,
        ]);

        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil diperbarui');
    }

    // HAPUS SPP
    public function destroy($id)
    {
        SPP::destroy($id);
        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil dihapus');
    }
}