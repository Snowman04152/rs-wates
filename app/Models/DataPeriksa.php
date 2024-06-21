<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPeriksa extends Model
{
    use HasFactory;
    public function dataAlat()
    {
        return $this->belongsTo(DataAlat::class, 'data_alat_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'pegawai_id');
    }
}
