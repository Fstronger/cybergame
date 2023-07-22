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
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFactionHeroes($factionId)
    {
        $faction = RefFactions::findOrFail($factionId);

        $factionHelper = new FactionHelper($faction);

        return  response()->json(['data' => $factionHelper->getFactionHeroes(), 'status' => '200']);
    }

}
