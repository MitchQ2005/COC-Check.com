<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/player.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="player-container">
        <h1>Player Stats: {{ $playerData['name'] }}</h1>

        <div class="player-info">
            <div class="player-header">
                <p><strong>Speler Naam:</strong> {{ $playerData['name'] }}</p>
                <p><strong>Trofeeën:</strong> 
                    {{ $playerData['trophies'] }}
                </p>
                <p><strong>League:</strong> 
                    @if(isset($playerData['league']))
                        {{ $playerData['league']['name'] }}
                        <img src="{{ $playerData['league']['iconUrls']['small'] }}" alt="League Embleem">
                    @else
                        Geen League
                    @endif
                </p>
                <p><strong>Clan:</strong> 
                    @if(isset($playerData['clan']))
                        {{ $playerData['clan']['name'] }}
                        <img src="{{ $playerData['clan']['badgeUrls']['small'] }}" alt="Clan Logo">
                    @else
                        Geen Clan
                    @endif
                </p>
                <p><strong>Trofeeën Vandaag:</strong> {{ $playerData['attackWins'] }}</p>
                <p><strong>Sterren Vandaag:</strong> {{ $playerData['donations'] }}</p>
            </div>
        </div>

        <div class="player-stats">
            <div class="stat-box">
                <strong>Townhall Level:</strong> {{ $playerData['townHallLevel'] }}
                @if(isset($playerData['townHallWeaponLevel']))
                    <p><strong>Townhall Weapon Level:</strong> {{ $playerData['townHallWeaponLevel'] }}</p>
                @endif
            </div>
            <div class="stat-box">
                <strong>Builder Base:</strong> {{ $playerData['builderHallLevel'] }}
            </div>
            <div class="stat-box">Prestaties</div>
        </div>

        <div class="chart-container">
            <canvas id="troopChart"></canvas>
        </div>

        <div class="stats-row">
            <div class="stat-box">Aanvallen</div>
            <div class="stat-box">Verdedigingen</div>
            <div class="stat-box">Clan Oorlogsbijdragen</div>
            <div class="stat-box">Clan Oorlog Bijdragen Aantal Sterren</div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById("troopChart").getContext("2d");
            var troopLevels = {
                @foreach($playerData['troops'] ?? [] as $troop)
                    "{{ $troop['name'] }}": {{ $troop['level'] }},
                @endforeach
            };

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: Object.keys(troopLevels),
                    datasets: [{
                        label: "Troepen Levels",
                        data: Object.values(troopLevels),
                        backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4CAF50", "#9C27B0", "#FF5722"]
                    }]
                }
            });
        });
    </script>
</x-app-layout>