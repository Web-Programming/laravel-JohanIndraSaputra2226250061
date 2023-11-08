<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function insertElq(){
        //single assignment
        // $mhs = new Mahasiswa();
        // $mhs->nama = "Johan Indra Saputra";
        // $mhs->npm = "2226250061";
        // $mhs->tempat_lahir = "Palembang";
        // $mhs->tanggal_lahir = date("Y-m-d");
        // $mhs->save();

        //mass assignment
        $mhs = Mahasiswa::insert(
        [
            ['nama' => 'Indra Johan',
            'npm' => '2225250061',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => date("Y-m-d")
            ], ['nama' => 'Johan',
            'npm' => '2225250062',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => date("Y-m-d")
            ]
        ]
        );
        dump($mhs);
    }

    public function updateElq()
    {
        $mahasiswa = Mahasiswa::where("npm","2226250061")->first();

        $mahasiswa->nama = 'Khadijah';
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function deleteElq()
    {
        $mahasiswa = Mahasiswa::where("npm", "2226250061")->first();

        $mahasiswa->delete();
        dump($mahasiswa);
    }

    public function selectElq()
    {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();
        // dump($allmahasiswa);

        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa,'kampus'=> $kampus]);
    }

    public function allJoinElq(){
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::has('prodi')->get();
        return view('mahasiswa.index', ['allmahasiswa'=> $mahasiswa, 'kampus' => $kampus]);
    }
}
