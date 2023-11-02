<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Functions;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\FunctionsRepository;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $function = new Functions();

        $functionRepository = new FunctionsRepository($function);

        $user = new User();

        $userRepository = new UserRepository($user);

        
        $request->authenticate();

        $request->session()->regenerate();

        $user = $userRepository->findByEmail($request->email);

        $user_function = $functionRepository->find($user->functions_id);       

        switch($user_function ->name){
            case "ADMIN":
                return redirect()->intended(RouteServiceProvider::ADMIN);
                break;
            case "SUPER":
                return redirect()->intended(RouteServiceProvider::ADMIN);
                break; 
            case "CLIENT":
                return redirect()->intended(RouteServiceProvider::CLIENT);
                break; 
            default:
                return redirect()->intended(RouteServiceProvider::LOGIN);
                break;
                            
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
