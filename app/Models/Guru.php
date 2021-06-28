<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $fillable = ['nik', 'nama'];

    public function kelas()
    {
        return $this->hasOne(Kelas::class);
    }
}
