<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\admin;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\reset_password_token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\New_;

class AuthController extends Controller
{
    public function admin_anitialization() {
        $admin = new admin;
        $admin->email = 'admin321@gmail.com';
        $admin->recovery_email = 'fmuntaha568@gmail.com';
        $admin->password = Hash::make('admin000');
        $admin->save();
        return view('Authentication.sign-out');
    }
    public function sign_up_page() {
        return view('Authentication.sign-up');
    }
    public function sign_up(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|regex:/^\S*$/',
            'recoveryEmail' => 'required|email',
            'phoneNumber' => 'required|numeric|digits:11',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'terms' => 'accepted',
        ], [
            'email.regex' => 'The username should not contain spaces.'
        ]);
        $checkEmailExist = Customer::where('email',$request['email']. '@gmail.com')->first();
        if ($checkEmailExist) {
            $emailErr = 'email is already exist.';
            $old = array('name' => $request['name'],'recoveryEmail' => $request['recoveryEmail'],'email' => $request['email'],'phoneNumber' => $request['phoneNumber'],'password_confirmation' => $request['password_confirmation']);
            $data = compact('emailErr','old');
            return view('Authentication.sign-up')->with($data);  
        }
        $add_customer = new Customer;
        $add_customer->name = $request['name'];
        $add_customer->recovery_email = $request['recoveryEmail'];
        $add_customer->email = $request['email'] . '@gmail.com';
        $add_customer->phone_num = $request['phoneNumber'];
        $add_customer->password = Hash::make($request['password']);
        $add_customer->save();
        session()->flush();
        session()->put(['email' => $request['email'] , 'password' => $request['password'], 'loginStatus' => 'customer']);
        return redirect('/landing/index');
    }
    public function sign_in_page() {
        return view('Authentication.sign-in');
    }
    public function sign_in(Request $request) {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8',
        ]);
        $checkEmailExist = false;
        $checkCustomerExist = Customer::where('email',$request['email'])->first();
        if ($checkCustomerExist) {
            $checkEmailExist = true;
            if (Hash::check($request['password'],$checkCustomerExist->password) ) {
                session()->flush();
                session()->put(['email' => $request['email'] , 'password' => $request['password'], 'loginStatus' => 'customer']);
                return redirect('/landing/index');
            } else {
                $passErr = 'Wrong password. Try again';
                $old = array('email' => $request['email'], 'password' => $request['password']);
                $data = compact('passErr','old');
                return view('Authentication.sign-in')->with($data);
            }
        }
    
        if (!$checkEmailExist) {
            $checkAdminExist = admin::where('email',$request['email'])->first();
            if ($checkAdminExist) {
                $checkEmailExist = true;
                if (Hash::check($request['password'],$checkAdminExist->password) ) {
                    session()->flush();
                    session()->put(['email' => $request['email'] , 'password' => $request['password'], 'loginStatus' => 'admin']);
                    return redirect('/landing/index');
                } else {
                    $passErr = 'Wrong password. Try again';
                    $old = array('email' => $request['email'], 'password' => $request['password']);
                    $data = compact('passErr','old');
                    return view('Authentication.sign-in')->with($data);
                }
            }
        }
        if (!$checkEmailExist) {
            $emailErr = "Couldn't find your Account";
            $old = array('email' => $request['email'], 'password' => $request['password']);
            $data = compact('emailErr','old');
            return view('Authentication.sign-in')->with($data);
        }
    }
    public function sign_out_page() {
        session()->forget('email','password','loginStatus');
        return view('Authentication.sign-out');
    }
    public function forgot_password_page() {
        return view('Authentication.forgot-password');
    }
    public function forgot_password(Request $request) {
            $request->validate([
                'email' => 'required|email'
            ]);
        
            // Customer Table Check
            $customer = Customer::where('email', $request->email)->first();
            if ($customer) {
                $recoveryEmail = $customer->recovery_email ?? $customer->email; // Prefer recovery email
                $token = Str::random(60);
                
                // Save in Password Reset Table
                DB::table('password_resets')->insert([
                    'email' => $customer->email,
                    'token' => $token,
                    'user_type' => 'customer',
                    'created_at' => now(),
                ]);
        
                // Send Reset Email
                Mail::to($recoveryEmail)->send(new ResetPasswordMail($token));
                $msg1 = 'password reset url send succussfully';
                $data = compact('msg1','token');
                return view('Authentication.forgot-password')->with($data);
            }
        
            // Admin Table Check
            $admin = Admin::where('email', $request->email)->first();
            if ($admin) {
                $recoveryEmail = $admin->recovery_email ?? $admin->email;
                $token = Str::random(60);
        
                DB::table('password_resets')->insert([
                    'email' => $admin->email,
                    'token' => $token,
                    'user_type' => 'admin',
                    'created_at' => now(),
                ]);
        
                Mail::to($recoveryEmail)->send(new ResetPasswordMail($token));
                $msg1 = 'password reset url send succussfully';
                $data = compact('msg1','token');
                return view('Authentication.forgot-password')->with($data);
            }
            $recovEmail = 'error your email is incorrect .';
            $data = compact('recovEmail');
            return view('Authentication.forgot-password')->with($data);
    }
    public function reset_password_page($token) {
        $data = compact('token');
        return view('Authentication.reset-password')->with($data);
    }
    public function reset_password(Request $request) {
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'reset_token' => ['required',
            Rule::exists('password_resets', 'token')->where('is_deleted', 0)
            ]
        ]);
        $checkToken = reset_password_token::where('token',$request->reset_token)->first();
        if ($checkToken->user_type == 'customer') {
            $resetpassword = Customer::where('email',$checkToken->email)->first();
            $resetpassword->password = Hash::make($request['password']);
            $resetpassword->save();
            session()->flush();
            session()->put(['email' => $resetpassword->email , 'password' => $resetpassword->password, 'loginStatus' => 'customer']);
            return redirect('/landing/index');
        } else {
            $resetpassword = admin::where('email',$checkToken->email)->first();
            $resetpassword->password = Hash::make($request['password']);
            $resetpassword->save();
            session()->flush();
            // dd($resetpassword);
            // die;
            session()->put(['email' => $resetpassword->email , 'password' => $resetpassword->password, 'loginStatus' => 'admin']);
            return redirect('/landing/index');
        }
    }
}
