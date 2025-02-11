<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Session;
use Throwable;

class AuthController extends Controller
{
  public function loadRegisterForm()
  {
    return view('register-form');
  }

  public function registerUser(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'username' => 'required|min:4|max:12',
      'password' => 'required|min:4|max:8|confirmed',
    ]);

    try {
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->username = $request->username;
      $user->password = Hash::make($request->password);
      $user->save();
      //add user_id in user_profiles table
      $user_profile = new UserProfile;
      $user_profile->user_id = $user->id;
      $user_profile->save();


      return redirect('/register')->with('success', 'You have been registered');
    } catch (Exception $e) {

      return redirect('/register')->with('error', $e->getMessage());
    }
  }

  public function loadLoginPage()
  {
    return view('login-page');
  }

  public function loginUser(Request $req)
  {
    $req->validate([
      'username' => 'required|min:4|max:12',
      'password' => 'required|min:4|max:8'
    ]);
    try {
      $userCredential = $req->only('username', 'password');
      if (Auth::attempt($userCredential)) {

        if (auth()->user()->role == 0) {
          return redirect('/user/dashboard')->with('success', 'Welcome to Dashboard');
        } elseif (auth()->user()->role == 1) {
          return redirect('/admin/dashboard')->with('success', 'Welcome to Admin Dashboard');
        } else {
          return redirect('/')->with('error', 'Error to find your role');
        }
      } else {
        return redirect('/login')->with('error', 'Wrong username or password');
      }
    } catch (Exception $ex) {
      return redirect('/login')->with('error', $ex->getMessage());
    }
  }

  public function loadHomePage()
  {
    return view('user.home-page');
  }

  public function LogoutUser(Request $request)
  {
    Session::flush();
    Auth::logout();
    return redirect('/login');
  }

  public function forgotPage()
  {
    return view('forgot-password');
  }


  public function forgotPassword(Request $request)
  {

    $request->validate([
      'email' => 'required|email'
    ]);

    $user = User::where('email', $request->email)->get();
    //  dd($user);

    foreach ($user as $value) {
      # code...
    }


    if (count($user) > 0) {
      $token = Str::random(40);
      $domain = URL::to('/');
      $url = $domain . '/reset/password?token=' . $token;
      $data['url'] = $url;
      $data['email'] = $request->email;
      $data['title'] = 'Hacker';
      $data['body'] = 'Please click the link below to reset your password';

      Mail::send('forgotPasswordMail', ['data' => $data], function ($message) use ($data) {
        $message->to($data['email'])->subject($data['title']);
      });

      //  $dataTime = Carbon::now()->format('Y-m-d H:i:s');


      $passwordReset = new PasswordReset;
      $passwordReset->email = $request->email;
      $passwordReset->token = $token;
      $passwordReset->user_id = $value->id;
      //  $passwordReset->created_at = $dataTime;
      $passwordReset->save();

      return back()->with('success', 'please check your mail inbox to reset your password');
    } else {
      return redirect('/forgot/password')->with('error', 'sorry, email does not exist in our system!');
    }
  }

  public function loadResetPassword(Request $request)
  {
    $resetData = PasswordReset::where('token', $request->token)->get();
    if (isset($request->token) && count($resetData) > 0) {
      $user = User::where('id', $resetData[0]['user_id'])->get();
      foreach ($user as $user_data) {
        # code...
      }
      return view('reset-password', compact('user_data'));
    } else {
      return view('404');
    }
  }

  // perform password reset logic here

  public function ResetPassword(Request $request)
  {
    $request->validate([
      'password' => 'required|min:4|max:8|confirmed'
    ]);
    try {
      $user = User::find($request->user_id);
      $user->password = Hash::make($request->password);
      $user->save();

      // delete reset token
      PasswordReset::where('email', $request->user_email)->delete();

      return redirect('/login')->with('success', 'Password Changed Successfully');
    } catch (\Exception $e) {
      return back()->with('error', $e->getMessage());
    }
  }

  public function load404()
  {
    return  view('404');
  }
}
