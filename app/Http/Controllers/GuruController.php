<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //redirect ke halaman guru
        $gurus = Guru::all();
        return view('admin.guru.index',compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'guru')->get();

        //redirect ke halaman tambah guru
        return view('admin.guru.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi input
        $request->validate([
            'nip' => 'required|string|size:18|unique:gurus,nip',
            'nama_guru' => 'required|string|max:100',
            'user_id' => 'required|exists:users,id',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);
        // Ambil data user berdasarkan ID
        $user = User::findOrFail($request->user_id);

        // Simpan data guru
        Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama_guru,
            'user_id' => $user->id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $user->email, // Menggunakan email dari user
        ]);

        // Redirect ke halaman daftar guru
        return redirect()->route('guru.index')
            ->with('success', 'Guru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $guru = Guru::findOrFail($id)->delete();
        
        return redirect()->route('guru.index')
            ->with('success', 'Guru berhasil dihapus');
    }
}
