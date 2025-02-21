<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/clan.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="clan-container">
        @if(isset($error))
            <p>Failed: {{ $error }}</p>
        @else
            <h1>Clan Stats: {{ $clanData['name'] }}</h1>

            <div class="clan-info">
                <div class="clan-header">
                    <p><strong>Clan Naam:</strong> {{ $clanData['name'] }}</p>
                    <p><strong>Clan Level:</strong> {{ $clanData['clanLevel'] }}</p>
                    <p><strong>Clan Trofeeën:</strong> {{ $clanData['clanPoints'] }}</p>
                    @if(isset($clanData['clanVersusPoints']))
                        <p><strong>Clan War Trofeeën:</strong> {{ $clanData['clanVersusPoints'] }}</p>
                    @endif
                    <p><strong>Clan Omschrijving:</strong> {{ $clanData['description'] }}</p>
                    <p><strong>Clan Badge:</strong> 
                        @if(isset($clanData['badgeUrls']))
                            <img src="{{ $clanData['badgeUrls']['small'] }}" alt="Clan Badge">
                        @endif
                    </p>
                </div>
            </div>

            <div class="clan-stats">
                <div class="stat-box">
                    <strong>Clan Members:</strong> {{ $clanData['members'] }}
                </div>
                <div class="stat-box">
                    <strong>War Wins:</strong> {{ $clanData['warWins'] }}
                </div>
                <div class="stat-box">
                    <strong>War Win Streak:</strong> {{ $clanData['warWinStreak'] }}
                </div>
                @if(isset($clanData['warTies']))
                    <div class="stat-box">
                        <strong>War Ties:</strong> {{ $clanData['warTies'] }}
                    </div>
                @endif
                @if(isset($clanData['warLosses']))
                    <div class="stat-box">
                        <strong>War Losses:</strong> {{ $clanData['warLosses'] }}
                    </div>
                @endif
            </div>

            <table class="memberstable">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>League</th>
                        <th>Level</th>
                        <th>Name</th>
                        <th>Donated</th>
                        <th>Received</th>
                        <th>Trophies</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clanData['memberList'] as $member)
                        <tr>
                            <td>{{ $member['clanRank'] }}</td>
                            <td>
                                @if(isset($member['league']['iconUrls']['tiny']))
                                    <img src="{{ $member['league']['iconUrls']['tiny'] }}" alt="{{ $member['league']['name'] }}">
                                @endif
                            </td>
                            <td>{{ $member['expLevel'] }}</td>
                            <td>
                                <strong>{{ $member['name'] }}</strong><br>
                                <span style="color: grey;">{{ $member['role'] }}</span>
                            </td>
                            <td>{{ $member['donations'] }}</td>
                            <td>{{ $member['donationsReceived'] }}</td>
                            <td>{{ $member['trophies'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>