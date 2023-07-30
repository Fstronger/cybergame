<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RefCharacteristics;
use App\Models\RefFactions;
use App\Models\RefHeroesFactionCharacteristics;
use App\Models\RefHeroesFactions;
use App\Models\User;
use App\Models\UserCharacteristics;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
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
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
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
//
//        $userCharacteristics = UserCharacteristics::upsert([
//            [
//                'user_id' => $user['id'],
//                'characteristic_id' => RefCharacteristics::ATTACK,
//                'amount' => 15
//            ],
//            [
//                'user_id' => $user['id'],
//                'characteristic_id' => RefCharacteristics::ARMOR,
//                'amount' => 20
//            ],
//            [
//                'user_id' => $user['id'],
//                'characteristic_id' => RefCharacteristics::HP,
//                'amount' => 100
//            ]
//        ], ['user_id', 'characteristic_id'], ['amount']);

//        event(new Registered($user));
//
//        Auth::login($user);

//        return redirect(RouteServiceProvider::HOME);

        return  response()->json(['data' => $user, 'status' => '200']);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function registerComplete(Request $request): \Illuminate\Http\JsonResponse
    {
        $findUser = User::findOrFail($request->user_id);

        if ($findUser){
            $findFaction = RefFactions::findOrFail($request->faction_id);
            $findHeroes = RefHeroesFactions::findOrFail($request->heroes_id);
            $findUser->update([
                'heroes_id' => $findHeroes->getId(),
                'faction_id' => $findFaction->getId()
            ]);

        $heroesStats = RefHeroesFactionCharacteristics::findOrFail('heroes_id', $findHeroes->getId());

        $userCharacteristics = UserCharacteristics::upsert([
            [
                'user_id' => $findUser->getId(),
                'characteristic_id' => RefCharacteristics::ATTACK,
                'amount' => 15
            ],
            [
                'user_id' => $findUser->getId(),
                'characteristic_id' => RefCharacteristics::ARMOR,
                'amount' => 20
            ],
            [
                'user_id' => $findUser->getId(),
                'characteristic_id' => RefCharacteristics::HP,
                'amount' => 100
            ]
        ], ['user_id', 'characteristic_id'], ['amount']);

            return  response()->json(['data' => $findUser, 'status' => '200']);
        }else{
            return  response()->json(['message' => 'Произошла ошибка, попробуйте позднее', 'status' => '500']);
        }
    }
}
