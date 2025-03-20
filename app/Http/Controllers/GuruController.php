<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

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
        // Validasi request
        $validator = \Validator::make($request->all(), [
            'nip' => 'required|string|size:18|unique:gurus,nip',
            'nama_guru' => 'required|string|max:100',
            'user_id' => 'required|exists:users,id|unique:gurus,user_id',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        // Jika validasi gagal, kirimkan response JSON agar tidak mengembalikan HTML error
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        // Ambil user
        $user = User::findOrFail($request->user_id);

        // Simpan data
        Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama_guru,
            'user_id' => $user->id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $user->email,
        ]);

        // Kembalikan response JSON sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Guru berhasil ditambahkan!',
        ], 200);
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
    public function edit($id)
    {
        // Ambil data guru berdasarkan ID
        $guru = Guru::findOrFail($id);

        // Ambil data user berdasarkan ID
        $users = User::where('role', 'guru')->get();

        //redirect ke halaman edit guru
        return view('admin.guru.edit', compact('guru', 'users'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi request
        $validator = \Validator::make($request->all(), [
            'nip' => 'required|string|size:18|unique:gurus,nip,' . $id,
            'nama_guru' => 'required|string|max:100',
            'user_id' => 'required|exists:users,id|unique:gurus,user_id,' . $id,
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        // Jika validasi gagal, kirimkan response JSON agar tidak mengembalikan HTML error
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        // Ambil guru berdasarkan ID
        $guru = Guru::findOrFail($id);

        // Ambil user
        $user = User::findOrFail($request->user_id);

        // Update data
        $guru->update([
            'nip' => $request->nip,
            'nama' => $request->nama_guru,
            'user_id' => $user->id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $user->email,
        ]);

        // Kembalikan response JSON sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Guru berhasil diperbarui!',
        ], 200);
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
