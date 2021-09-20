<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function changePassword()
    {
        return view('auth.change-pass');
    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:4',
            'repeat_password' => 'required|same:new_password',
        ]);

        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error",
                "New Password cannot be same as your current password. Please choose a different password.");
        }

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error",
                "Your current password does not matches with the password you provided. Please try again.");
        }

        $user = Auth::user();

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->
            back()
            ->with('success',
                'Your Password has been updated. \n Remember to use it Next time you log in.');

    }

    public function downloadTemplate($filename)
    {
        $file_path = public_path('templates/'.$filename);
        return response()->download($file_path);

    }
}
