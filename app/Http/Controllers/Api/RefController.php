<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FactionHelper;
use App\Http\Controllers\Controller;
use App\Models\RefFactions;
use Illuminate\Http\JsonResponse;

class RefController extends Controller
{


    /**
     * Возращает список фракций
     * @return JsonResponse
     */
    public function getFactions(): JsonResponse
    {
        $factions = RefFactions::all();
        $factionWithHeroes = [];
        foreach($factions as $faction){
            $factionWithHeroes[] = [
                'id' => $faction->id,
                'name' => $faction->name,
                'description' => $faction->description,
                'image' => $faction->image
            ];
        }

        return  response()->json(['data' => $factionWithHeroes, 'status' => '200']);
    }

    /**
     * Возращает список героев фракции
     * @param $factionId
     * @return JsonResponse
     */
    public function getFactionHeroes($factionId): JsonResponse
    {
        $faction = RefFactions::findOrFail($factionId);

        $factionHelper = new FactionHelper($faction);

        return  response()->json(['data' => $factionHelper->getFactionHeroes(), 'status' => '200']);
    }

}
