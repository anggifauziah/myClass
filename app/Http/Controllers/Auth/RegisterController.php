<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Students;
use App\Models\Teacher;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected function create(array $data)
    {
        $request = request();

        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'level_user' => $data['level'],
        ]);

        if($data['level'] == 1){
            Students::create([
                'user_id' => $user->id,
                'student_name' => $data['name'],
                'student_gender' => $data['gender'],
                'student_birthOfdate' => $data['date'],
            ]);
            if($request->hasfile('photo')){
                $studentPhoto = new Students;
                $photo = $request->file('photo');
                $name = $photo->getClientOriginalName();
                $photo->move(public_path().'/files/user_photo', $name);
                $studentPhoto->student_photo = $name;
                $studentPhoto->save();
            }
        }else{
            Teacher::create([
                'user_id' => $user->id,
                'teacher_name' => $data['name'],
                'teacher_gender' => $data['gender'],
                'teacher_birthOfdate' => $data['date'],
            ]);
            if($request->hasfile('photo')){
                $teacherPhoto = new Teacher;
                $photo = $request->file('photo');
                $name = $photo->getClientOriginalName();
                $photo->move(public_path().'/files/user_photo', $name);
                $teacherPhoto->teacher_photo = $name;
                $teacherPhoto->save();
            }
        }
        return $user;
    }
}
