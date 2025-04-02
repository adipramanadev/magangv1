<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanPKL extends Model
{
    //
    protected $fillable = [
        'user_id',
        'dudi_id',
        'tanggal_pengajuan',
        'file_surat_pengajuan',
        'status_pengajuan',
    ];
    protected $casts = [
        'tanggal_pengajuan' => 'date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function dudi()
    {
        return $this->belongsTo(Dudi::class);
    }

    public function getFilePathAttribute()
    {
        return $this->file_surat_pengajuan ? Storage::url($this->file_surat_pengajuan) : null;
    }
}
