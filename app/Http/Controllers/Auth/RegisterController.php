<?php

namespace App\Http\Controllers\Auth;
use App\Mail\Verifyemail;
use Mail;
use App\User;
use App\VerifyUser;
use App\Admin;
use App\Writer;
use App\Termconditioncontent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:writer');
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
            'fname' => 'required|string|alpha|max:255',
            'lname' => 'required|string|alpha|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'dob' => 'required|date_format:Y-m-d',
            'gender' => 'required',
            'age' => 'required|numeric|digits_between:2,3|max:125',
            'height' => 'required|numeric|digits_between:2,3',
            'weight' => 'required|numeric|digits_between:2,3',
            'contact_no' => 'required|numeric|digits:10',
            'address' => 'required|max:2000',
            'agree-term' => 'accepted'
        ],[
            'fname.required' => 'Enter your first name.',
            'fname.alpha' => 'First name should be charecters.',
            'lname.required' => 'Enter your last name.',
            'lname.alpha' => 'Last name should be charecters.',
            'email.required' => 'Enter your email.',
            'email.unique' => 'This email alredy exist in system.',
            'email.email' => 'Enter valid email id.',
            'password.required' => 'Enter your password',
            'password.min' => 'Enter password greater than 6 chars.',
            'password.confirmed' => 'Password not match with confirm password.',
            'dob.required' => 'Enter your DOB.',
            'dob.date_format' => 'Not matched with fronmat YYYY-mm-dd',
            'gender.required' => 'Select your Gender',
            'age.required' => 'Enter your age.',
            'age.numeric' => 'Enter numeric value only',
            'age.max' => 'Enter only 2 digits.',
            'height.required' => 'Enter your height.',
            'height.numeric' => 'Enter numeric values only.',
            'height.digits_between' => 'Enter height between 2-3 digits.',
            'weight.required' => 'Enter your weight.',
            'weight.numeric' => 'Enter numeric values only.',
            'weight.digits_between' => 'Enter weight between 2-3 digits',
            'contact_no.required' => 'Enter your contact no.',
            'contact_no.numeric' => 'Enter only numeric value.',
            'contact_no.max' => 'Enter only 2 digits',
            'address.required' => 'Enter your address',
            'agree-term.accepted' => 'Accept Terms & condition.'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showWriterRegisterForm()
    {
        return view('auth.register', ['url' => 'writer']);
    }

    public function showRegistrationForm()
    {
        $termconditioncontents = Termconditioncontent::all();
        return view('auth.register',compact('termconditioncontents'));
    }
    /**
     * @param array $data
     *
     * @return mixed
     */
    protected function create(array $data)
    {

        $this->validator($data)->validate();
        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'contact_no' => $data['contact_no'],
            'age' => $data['age'],
            'height' => $data['height'],
            'weight' => $data['weight'],
            'username' => $data['email'],
            'role' => 'user',
            'profile_pic' => 'default-user-profile-image-png-6.png',
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'todays_date' => date('Y-m-d')
            // asset/assets_user\profile_pic/Joana-Doe.jpg This should be the profile pic path
        ]);

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);

        Mail::to($user->email)->send(new Verifyemail($user));
        // return redirect()->intended('login')->with('message','Your registration is successfully.Verification link sent it on your mail. please check your email...');

        return redirect('/login');
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

        //$this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('message', 'We sent you an activation code. Check your email and click on the link to verify.');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createWriter(Request $request)
    {
        $this->validator($request->all())->validate();
        Writer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/writer');
    }

    // Verify email and check mail already verifed or not.
    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/login')->with('message', "Sorry your email cannot be identified.");
        }
        return redirect('/login')->with('message', $status);
    }
}
