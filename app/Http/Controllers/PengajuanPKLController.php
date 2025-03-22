<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPKL;
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
        //
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
