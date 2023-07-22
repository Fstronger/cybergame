<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FactionHelper;
use App\Http\Controllers\Controller;
use App\Models\RefFactions;

class RefController extends Controller
{

    /**
     * Возращает список героев фракции
     * @param $factionId
     * @return array
     */
    public function getFactionHeroes($factionId): array
    {
        $faction = RefFactions::findOrFail($factionId);

        $factionHelper = new FactionHelper($faction);

        return $factionHelper->getFactionHeroes();
    }

}
