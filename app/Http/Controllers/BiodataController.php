<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index()
    {
        $biodatas = Biodata::all();
        return view('biodata.index', compact('biodatas'));
    }

    public function create()
    {
        return view('biodata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Biodata::create($request->all());

        return redirect()->route('biodata.index');
    }

    public function edit($id)
    {
        $biodata = Biodata::find($id);
        return view('biodata.edit', compact('biodata'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $biodata = Biodata::find($id);
        $biodata->update($request->all());

        return redirect()->route('biodata.index');
    }

    public function destroy($id)
    {
        Biodata::destroy($id);
        return redirect()->route('biodata.index');
    }
    public function deleteAll()
    {
        Biodata::truncate(); // Menghapus semua data dari tabel
        return redirect()->route('biodata.index')->with('success', 'Semua data berhasil dihapus.');
    }
    
}
