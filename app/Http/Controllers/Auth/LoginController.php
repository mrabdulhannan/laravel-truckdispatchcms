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
                $this->addPunchinTime();
                return '/admin/dashboard';
                break;
            case 'sales':
                $this->addPunchinTime();
                return '/sales/dashboard';
                break;
            case 'dispatch':
                $this->addPunchinTime();
                return '/dispatch/dashboard';
                break;
            case 'qa':
                $this->addPunchinTime();
                return '/qa/dashboard';
                break;
            default:
                return '/qa/dashboard';
        }
    }

    public function addPunchinTime()
    {
        $user = auth()->user();
        // $currentDate = date('Y-m-d');
        // $currentTime = now(); // This gives you the current date and time as a Carbon instance
        $currentDate = now()->setTimezone('Asia/Karachi')->toDateString(); // Adjusting the time zone to PKT and getting the date
        $currentTime = now()->setTimezone('Asia/Karachi'); 

        // If you just want the time as a string, you can format it
        $formattedTime = $currentTime->format('H:i:s');

        $entry = auth()->user()->definetimetracking()->where('date', $currentDate)->firstOrNew();

        if (!$entry->exists) {
            // dd($formattedTime);
            $user->definetimetracking()->create([
                "date" => $currentDate,
                "login_time" => $formattedTime,
                "punch_in_time" => $formattedTime,
            ]);
        }
    }
}
