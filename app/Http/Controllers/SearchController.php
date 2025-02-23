<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClashOfClansService;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    protected $clashOfClansService;

    public function __construct(ClashOfClansService $clashOfClansService)
    {
        $this->clashOfClansService = $clashOfClansService;
    }

    public function index()
    {
        Log::info('SearchController@index called');
        return view('search.index');
    }

    public function searchPlayer(Request $request)
    {
        Log::info('SearchController@searchPlayer called');
        $playerTag = $request->input('tag');
        $cleanTag = str_replace('#', '', $playerTag); // Verwijder het # symbool
        return redirect()->route('player.show', ['tag' => $cleanTag]);
    }

    public function searchClan(Request $request)
    {
        Log::info('SearchController@searchClan called');
        $clanTag = $request->input('clan_tag');
        return redirect()->route('clan.show', ['tag' => $clanTag]);
    }

    public function showPlayer($tag)
    {
        Log::info('SearchController@showPlayer called with tag: ' . $tag);
        $playerData = $this->clashOfClansService->searchPlayer($tag);

        return view('player.show', compact('playerData'));
    }

    public function showClan($tag)
    {
        Log::info('SearchController@showClan called with tag: ' . $tag);
        $clanData = $this->clashOfClansService->searchClan($tag);

        if (isset($clanData['reason'])) {
            return view('clan.show', ['error' => $clanData['reason']]);
        }

        return view('clan.show', compact('clanData'));
    }
}

