<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RefCharacteristics;
use App\Models\RefFactions;
use App\Models\User;
use App\Models\UserCharacteristics;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        //Вывод всех фракций
        $factions = RefFactions::all();
        return Inertia::render('Auth/Register', [
            'factions' => $factions
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:'.User::class,
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'last_login' => ''
        ]);

        $userCharacteristics = UserCharacteristics::upsert([
            [
                'user_id' => $user['id'],
                'characteristic_id' => RefCharacteristics::ATTACK,
                'amount' => 15
            ],
            [
                'user_id' => $user['id'],
                'characteristic_id' => RefCharacteristics::ARMOR,
                'amount' => 20
            ],
            [
                'user_id' => $user['id'],
                'characteristic_id' => RefCharacteristics::HP,
                'amount' => 100
            ]
        ], ['user_id', 'characteristic_id'], ['amount']);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
