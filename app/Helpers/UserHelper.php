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

}
