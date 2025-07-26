<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class LoginGoogleCallback extends Controller
{
    public function GoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();


        $user = User::where('email', $googleUser->email)->first();
        if (!$user) {
            // INFO_USER
            $username = $googleUser->name;
            $slug = Str::slug($username);

            // PHOTOS
            $avatarUrl = $googleUser->avatar;
            $extension = pathinfo(parse_url($avatarUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
            $filename = 'IMG-' . uniqid() . $slug . '.' . $extension;
            $response = Http::get($avatarUrl);
            Storage::disk('s4')->put('/images/avatar/' . $filename, $response->body(), 'public');

            // SAVE DATA
            $Vkey = md5(date("YmdHis") . $googleUser->email);
            $user = User::create([
                'username' => $username,
                'slug' => Str::slug($username),
                'email' => $googleUser->email,
                'password' => bcrypt($Vkey),
                'avatar' => $filename,
                'is_active' => "1",
                'vKey' => $Vkey,
            ]);
        }

        Auth::guard('users')->loginUsingId($user->user_id);
        return <<<HTML
        <script>
            window.opener.postMessage('google-login-success', window.origin);
            window.close();
        </script>
        HTML;
    }
}
