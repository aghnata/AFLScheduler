<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\userRegistered;
use App\Aflee;
use App\Afler;

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
    protected $redirectTo = '/Schedule/All';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //memastikan redirect ke halaman login setelah register
        //return redirect('/login')->with('message2', 'The activation link has been sent to your email. Please check your email.');
        return redirect('/login')->with('message2', 'Akun Anda telah aktif, silakan login untuk masuk ke aplikasi AFL');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
        if ($data['position'] === "afler") {
            $afler = new  Afler;
            $afler->afler_name = $data['name'];
            $afler->save();

            $aflerId = Afler::latest()->first()->id;
            
            $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token' => str_random(20),
            'role_id' => 4,
            'status' => 1,
            'phone_number' => $data['phone_number'],
            'afler_id' => $aflerId
            ]);
        } else {
            $aflee = new  Aflee;
            $aflee->aflee_name = $data['name'];
            $aflee->save();

            $afleeId = Aflee::latest()->first()->id;
            
            $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token' => str_random(20),
            'role_id' => 5,
            'status' => 1,
            'phone_number' => $data['phone_number'],
            'aflee_id' => $afleeId
            ]);
        }

        //mengirim email untuk mengaktifkan account
        //Mail::to($user->email)->send(new userRegistered($user));
    }

    /*fungsi untuk verifikasi email(
    5. redirect ke halaman home setelah berhasil login
    )*/
    public function verify_register($token, $id)
    {
      //1. mengambil data user
      $user = User::find($id);

      //2. menguji apakah tokennya sama atau tidak
      if ($user->token != $token){
        return redirect('login')->with('warning', 'token mismatch');
      }

      //3. jika tokennya sama maka statusnya akan diubah menjadi 1
      $user->status = 1 ;
      $user->save();

      //4. redirect ke halaman home
      $this->guard()->login($user);
      return redirect('/admin')->with('message', 'Your account has been activated, enjoy it :)');

    }
}
