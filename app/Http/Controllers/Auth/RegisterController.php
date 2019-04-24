<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'wachtwoord' => ['required', 'string', 'min:8', 'confirmed'],
            'voornaam' => 'required|string',
            'achternaam' => 'required|string',
            'kaartnummer' => 'required|string|max:9',
            'postcode' => 'postal_code:NL',
            'straatnaam' => 'required|string|max:100',
            'huisnummer' => 'required|max:6',
            'plaats' => 'required|string|max:100',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['voornaam'].' '.$data['achternaam'],
            'email' => $data['email'],
            'password' => Hash::make($data['wachtwoord']),
            'firstname' => $data['voornaam'],
            'surname' => $data['achternaam'],
            'cardnumber' => $data['kaartnummer'],
            'postal_code' => $data['postcode'],
            'streetname' => $data['straatnaam'],
            'housenumber' => $data['huisnummer'],
            'city' => $data['plaats']
        ]);
    }
}
