<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class DudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dudis = Dudi::all();
        return view('admin.dudi.index', compact('dudis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //jurusan create 
        $jurusans = Jurusan::where('status', 'active')->get();
        return view('admin.dudi.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:20',
            'jurusan_id' => 'required|exists:jurusans,id',
            'status' => 'required|in:active,nonactive',
        ]);

        // Create a new Dudi entry
        Dudi::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'jurusan_id' => $request->jurusan_id,
            'status' => $request->status,
        ]);

        // Redirect back with a success message
        return redirect()->route('dudi.index')->with('success', 'Dudi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $dudi = Dudi::find($id);
        return view('admin.dudi.index', compact('dudi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //jurusan id
        $jurusans = Jurusan::where('status', 'active')->get();
        $dudi = Dudi::find($id);
        return view('admin.dudi.edit', compact('dudi', 'jurusans'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:20',
            'jurusan_id' => 'required|exists:jurusans,id',
            'status' => 'required|in:active,nonactive',
        ]);

        // update dudi
        Dudi::find($id)->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'jurusan_id' => $request->jurusan_id,
            'status' => $request->status,
        ]);

        // Redirect back with a success message
        return redirect()->route('dudi.index')->with('success', 'Dudi created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Dudi::find($id)->delete();
        return redirect()->route('dudi.index')->with('success', 'Dudi berhasil dihapus!');
    }
}
