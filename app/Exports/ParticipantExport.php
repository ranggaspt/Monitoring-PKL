<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ParticipantExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return [
            "Isi username tidak boleh sama", 
            "Masukkan password", 
            "nomor nim,nis, atau nomor nik",
            "Masukkan Nama Lengkap",
            "Masukkan laki-laki/perempuan",
            "Alamat Lengkap Peserta",
            "import foto",
            "Masukkan Email, tidak boleh sama",
            "Masukkan Pendidikan Terakhir",
            "Masukkan tanggal lahir dengan format tahun-bulan-tanggal (contoh : 2022-11-11)",
            "Masukkan nomor hp yang masih aktif, tidak boleh sama"
        ];
    }
    public function headings(): array

    {

        return [
            "username", 
            "password", 
            "nomor_identitas",
            "nama",
            "jenis_kelamin",
            "alamat",
            "foto",
            "email",
            "pendidikan_terakhir",
            "tanggal_lahir",
            "nomor_hp"
        ];

    }
}
