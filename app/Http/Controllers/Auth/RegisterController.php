<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\ValidationException;

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

    function index()
    {
        return view('register2');
    }

    function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = User::select("nim", "name")
                ->where('nim', 'LIKE', "{$query}")
                ->get();
            $output = '<span>Mahasiswa : </span> <ul class="ids" style="display:block;width:100%;background-color:#f0f0f0;padding:5px;border-radius:5px;margin-bottom:10px;">';
            foreach ($data as $row) {
                $output .= '
                <li class="p-2"><a href="#" class="text-danger">' . $row->nim . " - " . $row->name . '</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $request->session()->put('is-sign-up', 'sign-up-mode');

        $this->validate(
            $request,
            [
                'register_nim' => 'required|min:10|max:10',
                'register_password' => 'required|min:2|max:30',
                'file_url' => 'mimes:jpeg,jpg,png,gif|required|max:2000'
            ],
            [
                'file_url.mimes' => 'format file tidak didukung, silahkan masukan format gambar : jpeg,jpg atau png',
                'file_url.max' => 'Ukuran file tidak boleh lebih dari 2Mb'
            ]
        );

        //buat dapetin user dari nim yang di input
        $user = User::where('nim', $request->register_nim)->first();

        if (!$user) {
            $error = ValidationException::withMessages([
                'register_nim' => ['NIM tidak di temukan'],
            ]);

            throw $error;
        }

        //buat dapetin mahasiswa dari nim yang di input
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        if ($mahasiswa) {
            $error = ValidationException::withMessages([
                'register_nim' => ['Anda sudah terdaftar'],
            ]);

            throw $error;
        }

        $kode_prodi = substr($request->register_nim, 4, -3);
        $prodi = Prodi::where('kode_prodi', $kode_prodi)->first();

        $user->prodi_id = $prodi->id;
        $user->password = Hash::make($request->register_password);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->user_id = $user->id;

        $slug = Str::slug($request->register_nim);
        if ($request->file('file_url')) {
            $gambar = $request->file('file_url');
            $urlgambar = $gambar->storeAs("img/mahasiswa", "{$slug}.{$gambar->extension()}");
            $mahasiswa->file_url = $urlgambar;
        }

        if (
            $user->save() &&
            $mahasiswa->save()
        ) {
            $user->assignRole('mahasiswa');
            // $credentials = $request->only('register_nim', 'register_password');
            if (Auth::attempt(array('nim' => $request->register_nim, 'password' => $request->register_password))) {
                $request->session()->forget('sign-up-mode');

                return redirect()->route('home');
            }
        }
    }
}
