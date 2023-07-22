<?php

namespace App\Http\Middleware;

use App\Helpers\UserHelper;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $userCharacteristics = [];
        $userResources = [];
        if (!is_null($request->user())){
            $userHelper = new UserHelper($request->user());
            $userCharacteristics = $userHelper->getUserCharacteristics();
            $userResources = $userHelper->getUserResources();
        }

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
                'userCharacteristics' => $userCharacteristics,
                'userResources' => $userResources
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
        ]);
    }
}
