<?php

namespace App\Imports;

use App\Models\Participant;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Nette\Utils\DateTime;

class ParticipantImport implements ToModel,WithHeadingRow
{
    protected $users;
    public function __construct()
    {
        $this->users = User::select('id', 'username')->get();
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $jumlahRow = Participant::all()->count();
        $number = $jumlahRow + 1;
        $date = new DateTime();
        $timeNow = $date->format('dmy');
        $noreg = "REG-" . $timeNow . "-" . $number;
        $user = $this->users->where('username', $row['username'])->first();
        return new Participant([
            'user_id' => $user,
            'no_reg' => $noreg,
            'no_identity' => $row['nomor_identitas'],
            'name' => $row['nama'],
            'gender' => $row['jenis_kelamin'],
            'address' => $row['alamat'],
            'photo' => $row['foto'],
            'email' => $row['email'],
            'Education' => $row['pendidikan_terakhir'],
            'data_of_birth' => $row['tanggal_lahir'],
            'phone' => $row['nomor_hp'],
        ]);
    }
}
