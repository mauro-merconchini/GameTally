<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class SteamGridService
{
    protected static function request()
    {
        $baseUrl = 'https://www.steamgriddb.com/api/v2/';
        return Http::withToken('24dcf4ee16a28dcf66bf9a32a02fd802')->baseUrl($baseUrl);
    }

    public static function getAutoCompleteResults(string $gameName): array
    {
        $result = self::request()->get("search/autocomplete/$gameName");

        return $result->json('data');
    }

    public static function getGameIcon(int $gameId)
    {
        $result = self::request()->get("icons/game/{$gameId}");

        dd($result->json());
    }
}