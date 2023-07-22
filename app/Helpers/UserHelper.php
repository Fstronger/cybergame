<?php

namespace App\Helpers;

use App\Models\User;

class UserHelper
{

    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Получение характеристик игрока
     * @return array
     */
    public function getUserCharacteristics(): array
    {
        $characteristics = $this->user->characteristics;
        $userCharacteristics = [];
        foreach ($characteristics as $characteristic) {
            $userCharacteristics[] = [
                'name' => $characteristic->characteristicName->name,
                'icon' => $characteristic->characteristicName->icon,
                'amount' => $characteristic->amount
            ];
        }

        return $userCharacteristics;
    }

    /**
     * Получение ресурсов игрока
     * @return array
     */
    public function getUserResources(): array
    {
        $resources = $this->user->resources;
        $userResources = [];
        foreach ($resources as $resource) {
            $userResources[] = [
                'name' => $resource->resourcesName->name,
                'icon' => $resource->resourcesName->icon,
                'amount' => $resource->amount,
                'max_amount' => $resource->max_amount
            ];
        }

        return $userResources;
    }

}
