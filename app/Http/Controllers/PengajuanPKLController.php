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
            $file->storeAs('public/surat_pengajuan', $filename);
            $filePath = 'surat_pengajuan/' . $filename; //Tanpa "public/"
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
    public function edit($id)
    {
        //
        $pengajuan = PengajuanPKL::findOrFail($id);
        $users = User::where('role', 'siswa')->get(); // atau mahasiswa
        $dudis = Dudi::where('status', 'active')->get();
        return view('admin.pengajuanpkl.edit', compact('pengajuan', 'users', 'dudis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pengajuan = PengajuanPKL::findOrFail($id);
    
        $request->validate([
            'dudi_id' => 'required|exists:dudis,id',
            'tanggal_pengajuan' => 'required|date',
            'status_pengajuan' => 'required|in:menunggu,diterima,ditolak',
            'file_surat_pengajuan' => 'nullable|mimes:pdf|max:2048'
        ]);
    
        // handle file baru (jika diupload)
        if ($request->hasFile('file_surat_pengajuan')) {
            // Hapus file lama jika ada
            if ($pengajuan->file_surat_pengajuan && Storage::exists('public/' . $pengajuan->file_surat_pengajuan)) {
                Storage::delete('public/' . $pengajuan->file_surat_pengajuan);
            }
    
            $file = $request->file('file_surat_pengajuan');
            $filename = 'surat_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/surat_pengajuan', $filename);
            $pengajuan->file_surat_pengajuan = 'surat_pengajuan/' . $filename; // Tanpa "public/"
        }
    
        $pengajuan->dudi_id = $request->dudi_id;
        $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
        $pengajuan->status_pengajuan = $request->status_pengajuan;
        $pengajuan->save();
    
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil diupdate!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengajuan = PengajuanPKL::findOrFail($id);

        // Hapus file jika ada
        if ($pengajuan->file_surat_pengajuan && Storage::exists('public/' . $pengajuan->file_surat_pengajuan)) {
            Storage::delete('public/' . $pengajuan->file_surat_pengajuan);
        }

        $pengajuan->delete();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}

