<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ParticipantExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParticipantRequest;
use App\Http\Requests\UserRequest;
use App\Imports\ParticipantImport;
use App\Imports\UsersImport;
use App\Models\Participant;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\DateTime;

class AdminParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::all();
        $this->data['participants'] = $participants;
        return view('admin.participant.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jumlahRow = Participant::all()->count();
        $number = $jumlahRow + 1;
        $date = new DateTime();
        $timeNow = $date->format('dmy');
        $noreg = "REG-" . $timeNow . "-" . $number;
        $this->data['noreg'] = $noreg;
        return view('admin.participant.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParticipantRequest $request1, UserRequest $request2)
    {
        $params1 = $request1->all();
        $params2 = [
            'username' => $request2->username,
            'password' => Hash::make($request2->password),
            'role' => 'participant'
        ];
        if ($request1->has('photo')) {
            $params1['photo'] = $this->simpanImage('participant', $request1->file('photo'), $params2['username']);
        }
        $user = User::create($params2);
        if ($user) {
            $params1['user_id'] = $user->id;
            if (Participant::create($params1)) {
                alert()->success('Success', 'Data Berhasil Disimpan');
            } else {
                $user = User::findOrFail($user->id);
                $user->delete();
                alert()->error('Error', 'Data Gagal Disimpan');
            }
        }
        return redirect('admin/participant');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participant = Participant::findOrFail(Crypt::decrypt($id));
        $this->data['data'] = $participant;
        return view('admin.participant.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParticipantRequest $request1, UserRequest $request2, $id)
    {
        $params1 = $request1->all();
        $params2['username'] = $request2->username;

        if ($request2->filled('password')) {
            $params2['password'] = Hash::make($request2->password);
        } else {
            $params2 = $request2->except('password');
        }

        if ($request1->has('photo')) {
            $params1['photo'] = $this->simpanImage('participant', $request1->file('photo'), $params2['username']);
        } else {
            $params1 = $request1->except('photo');
        }

        $participant = Participant::findOrFail(Crypt::decrypt($id));
        $user = User::findOrFail($participant->user_id);
        if ($participant->update($params1) && $user->update($params2)) {
            alert()->success('Success', 'Data Berhasil Disimpan');
        } else {
            alert()->error('Error', 'Data Gagal Disimpan');
        }
        return redirect('admin/participant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = Participant::findOrFail(Crypt::decrypt($id));
        $url = $participant->photo;
        $dir = public_path('storage/' . substr($url, 0, strrpos($url, '/')));
        $path = public_path('storage/' . $url);

        File::delete($path);

        rmdir($dir);
        if ($participant->delete()) {
            $user = User::findOrFail($participant->user_id);
            $user->delete();
            alert()->success('Success', 'Data Berhasil Dihapus');
        }
        return redirect('admin/participant');
    }

    private function simpanImage($type, $foto, $nama)
    {
        $dt = new DateTime();

        $path = public_path('storage/uploads/profil/' . $type . '/' . $dt->format('Y-m-d') . '/' . $nama);
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true, true);
        }
        $file = $foto;
        $name =  $type . '_' . $nama . '_' . $dt->format('Y-m-d');
        $fileName = $name . '.' . $file->getClientOriginalExtension();
        $folder = '/uploads/profil/' . $type . '/' . $dt->format('Y-m-d') . '/' . $nama;

        $check = public_path($folder) . $fileName;

        if (File::exists($check)) {
            File::delete($check);
        }

        $filePath = $file->storeAs($folder, $fileName, 'public');
        return $filePath;
    }

    public function format() 
    {
        Excel::download(new ParticipantExport, 'peserta.xlsx');
        return redirect('admin/participant');
    }

    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
        Excel::import(new ParticipantImport,request()->file('file'));
        return back();
    }
}
