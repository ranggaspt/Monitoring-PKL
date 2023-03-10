<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\DateTime;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function generate()
    {
        $jumlahRow = Participant::all()->count();
        $number = $jumlahRow + 1;
        $date = new DateTime();
        $timeNow = $date->format('dmy');
        $noreg = "REG-" . $timeNow . "-" . $number;
        $this->data['noreg'] = $noreg;
        return view('auth.register', $this->data);
    }

    protected function create(array $data)
    {

        $result = User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role' => 'participant',
        ]);
        if ($result) {
            Participant::create([
                'name' => $data['name'],
                'no_reg' => $data['no_reg'],
                'user_id' => $result->id,
            ]);
            return $result;
        } else {
            $user = User::findOrFail($result->id);
            $user->delete();
        }
    }
}
