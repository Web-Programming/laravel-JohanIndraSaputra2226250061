<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    //jika nama table berbeda
    protected $table = "mahasiswas";

    // //mengatur kolom yang boleh diisi saat mass assignment
    protected $fillable = ['npm', 'nama', 'tempat_lahir', 'tanggal_lahir'];

    //mengatur kolom yang tidak boleh diisi
    // protected $guarded = [];

    public function prodi(){
        return $this->belongsTo('App\Models\Prodi');
    }
}
