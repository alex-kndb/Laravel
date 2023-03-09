<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Contracts\Social;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * @param string $driver
     * @return RedirectResponse
     */
    public function redirect(string $driver): RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * @param string $driver
     * @param Social $social
     * @return RedirectResponse
     */
    public function callback(string $driver, Social $social): RedirectResponse
    {
//        dd($social, Socialite::driver($driver)->user());
        return redirect($social->LoginAndGetRedirectUrl(
            Socialite::driver($driver)->user()
        ));
    }


}
