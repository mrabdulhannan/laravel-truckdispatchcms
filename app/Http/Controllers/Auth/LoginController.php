<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        
        switch (auth()->user()->user_type) {
            case 'admin':
                $user = auth()->user();
        $currentDate = date('Y-m-d');
        $currentTime = now(); // This gives you the current date and time as a Carbon instance

        // If you just want the time as a string, you can format it
        $formattedTime = $currentTime->format('H:i:s');

        $entry = auth()->user()->definetimetracking()->where('date', $currentDate)->firstOrNew();
        
        if (!$entry->exists) {
            // dd($formattedTime);
            $user->definetimetracking()->create([
                "date" => $currentDate,
                "login_time" => $formattedTime,
            ]);

        }
                return '/admin/dashboard';
                break;
            case 'sales':
                return '/sales/dashboard';
                break;
            case 'dispatch':
                return '/dispatch/dashboard';
                break;
            default:
                return '/dashboard';
        }
    }
}
