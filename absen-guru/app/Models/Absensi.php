<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'waktu_masuk', 'waktu_pulang', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
