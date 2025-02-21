<x-app-layout>
    <div class="search-container">
        <h1>Search</h1>

        <div class="search-boxes">
            <!-- Player Search -->
            <div class="search-box">
                <h2>Player Search</h2>
                <p>Enter a Supercell ID / player name</p>
                <form id="playerSearchForm">
                    @csrf
                    <input type="text" name="tag" id="playerTagInput" placeholder="Enter Player ID" required>
                    <button type="submit">Search</button>
                </form>
            </div>

            <!-- Clan Search -->
            <div class="search-box">
                <h2>Clan Search</h2>
                <p>Enter a Clan ID / clan name</p>
                <form id="clanSearchForm">
                    @csrf
                    <input type="text" name="clan_tag" id="clanTagInput" placeholder="Enter Clan ID" required>
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    <!-- ✅ JavaScript om de juiste URL te forceren zonder fout -->
    <script>
        document.getElementById("playerSearchForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Voorkomt standaard submit
            let playerTag = document.getElementById("playerTagInput").value.trim(); // Haal de tag op

            if (!playerTag) {
                alert("Please enter a valid Player Tag!");
                return;
            }

            playerTag = playerTag.replace("#", ""); // Verwijder het # symbool als die er is
            window.location.href = "/player/" + encodeURIComponent(playerTag); // Redirect naar de juiste URL
        });

        document.getElementById("clanSearchForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Voorkomt standaard submit
            let clanTag = document.getElementById("clanTagInput").value.trim(); // Haal de tag op

            if (!clanTag) {
                alert("Please enter a valid Clan Tag!");
                return;
            }

            clanTag = clanTag.replace("#", ""); // Verwijder het # symbool als die er is
            window.location.href = "/clan/" + encodeURIComponent(clanTag); // Redirect naar de juiste URL
        });
    </script>
</x-app-layout>
