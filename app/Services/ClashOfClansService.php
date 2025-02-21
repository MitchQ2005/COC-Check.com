<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ClashOfClansService
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = env('COC_API_URL');
        $this->apiKey = env('COC_API_KEY');
    }

    public function searchPlayer($playerTag)
    {
        $cleanTag = str_replace('#', '', $playerTag); // Verwijder #
        $url = "{$this->apiUrl}/players/%23" . urlencode($cleanTag);

        // Log de volledige URL en de response
        Log::info("API URL: $url");

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
        ])->get($url);

        Log::info("API Response: " . $response->body());

        if ($response->failed()) {
            Log::error("API Error: " . $response->body());
            return null;
        }

        return $response->json();
    }

    public function searchClan($clanTag)
    {
        $cleanTag = str_replace('#', '', $clanTag); // Verwijder #
        $url = "{$this->apiUrl}/clans/%23" . urlencode($cleanTag);

        // Log de volledige URL en de response
        Log::info("API URL: $url");

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
        ])->get($url);

        Log::info("API Response: " . $response->body());

        if ($response->failed()) {
            Log::error("API Error: " . $response->body());
            return $response->json();
        }

        return $response->json();
    }
}
