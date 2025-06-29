<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        $register_data = $request->validate([
            'name' => 'required|min:8|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:12|confirmed',
        ]);

        /**
         * @var \App\Models\User
         */
        $user = User::create($register_data);
        if (!empty($user->id)) {
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }

    public function prashtishLogIn(Request $request): RedirectResponse
    {
        $login_data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:12'
        ]);

        if (Auth::attempt($login_data)) {
            return redirect()->route('homepage');
        } else {
            return redirect()->back();
        }
    }

//    function to check whether user logged in clearly or not

    public function Homepage(): View|RedirectResponse
    {
        if (Auth::check()) {
            $all_recently_uploaded_lyrics = (new HomepageController())->recentlyUploadedLyrics();
            return view('Pages.homepage.homepage', compact('all_recently_uploaded_lyrics'));
        } else {
            return redirect()->route('login');
        }
    }


    public function logOut(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
