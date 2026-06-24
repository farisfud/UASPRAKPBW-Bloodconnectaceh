<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_pasien',
        'gol_darah',
        'rhesus',
        'jumlah_kantong',
        'tingkat_urgensi',
        'rumah_sakit',
        'lokasi',
        'kontak_nama',
        'kontak_telepon',
        'catatan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donorCommitments()
    {
        return $this->hasMany(\App\Models\DonorCommitment::class);
    }
}
