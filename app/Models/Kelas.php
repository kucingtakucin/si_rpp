<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['nama', 'id_guru'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }
}
