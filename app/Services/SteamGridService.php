<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class SteamGridService
{
    protected static function request()
    {
        $baseUrl = 'https://www.steamgriddb.com/api/v2/';
        return Http::withToken(env('STEAM_GRID_DB_TOKEN', 'forge'))->baseUrl($baseUrl);
    }

    public static function getAutoCompleteResults(string $gameName): array
    {
        $result = self::request()->get("search/autocomplete/$gameName");

        return $result->json('data');
    }

    public static function getGameIcon(int $gameId): string
    {
        //1. get the icon data from the API
        $result = self::request()->get("icons/game/{$gameId}");      
        
        //2. get the custom PNGs for the icons
        $icon = collect($result->json('data'))->where('style', 'official')->where('mime', 'image/png')->pluck('thumb')->first();

        //3. if custom is null, check again for official
        if (blank($icon))
        {
            $icon = collect($result->json('data'))->where('style', 'official')->where('mime', 'image/png')->pluck('thumb')->first();
        }

        //4. TODO if official is null, check for ICO

        //5. if official and custom are both null, you're fucked, there are NO icons, just use the placeholder
        if (blank($icon))
        {
            $icon = "https://cdn.onlinewebfonts.com/svg/img_408.png";
        }

        return $icon;
    }

    public static function getAllIcons(int $steamgrid_id): array
    {
        $result = self::request()->get("icons/game/{$steamgrid_id}");

        return collect($result->json('data'))->pluck('thumb')->toArray();
    }
}