<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class SteamGridService
{
    public static function getAutoCompleteResults(string $gameName): array
    {
        $path = "https://www.steamgriddb.com/api/v2/search/autocomplete/$gameName";
        $result = Http::withToken('24dcf4ee16a28dcf66bf9a32a02fd802')->get($path);

        return $result->json('data');
    }
}