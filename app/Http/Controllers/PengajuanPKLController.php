<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPKL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Dudi;
use Illuminate\Http\Request;

class PengajuanPKLController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //pengajuan pkl
        $pengajuans = PengajuanPKL::all();
        return view('admin.pengajuanpkl.index', compact('pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::where('role', 'siswa')->get(); // atau mahasiswa
        $dudis = Dudi::where('status', 'active')->get();
        return view('admin.pengajuanpkl.create', compact('users', 'dudis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'dudi_id' => 'required|exists:dudis,id',
            'tanggal_pengajuan' => 'required|date',
            'file_surat_pengajuan' => 'nullable|mimes:pdf|max:2048', // Maks 2MB
        ]);

        //Upload file jika ada
        $filePath = null;
        if ($request->hasFile('file_surat_pengajuan')) {
            $file = $request->file('file_surat_pengajuan');
            $filename = 'surat_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/surat_pengajuan', $filename);
        }

        //Simpan data
        PengajuanPKL::create([
            'user_id' => $request->user_id,
            'dudi_id' => $request->dudi_id,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'file_surat_pengajuan' => $filePath,
            'status_pengajuan' => 'menunggu', // default
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanPKL $pengajuanPKL)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanPKL $pengajuanPKL)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengajuanPKL $pengajuanPKL)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengajuanPKL $pengajuanPKL)
    {
        //
    }
}
