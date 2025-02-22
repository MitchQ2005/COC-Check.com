<?php

namespace App\Http\Controllers;

use App\Models\Base;
use App\Models\TownHall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    // deze methode zorgt ervoor dat alleen ingelogde gebruikers deze methodes kunnen doen zoals create store and update
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    // index functie om alle town hall levels te zien te zien.
    public function index()
    {
        $townHalls = TownHall::with('bases')->get();
        return view('bases.index', compact('townHalls'));
    }

    // spreekt voor zich, create functie, gaat naar bases.auth.create
    public function create()
    {
        $this->authorize('create', Base::class);
        $townHalls = TownHall::all();
        return view('bases.auth.create', compact('townHalls'));
    }

    // store functie, krijgt de $request mee om ervoor te zorgen dat alle velden goed zijn ingevuld
    // en stored ze in de DB. stuurt een return terug om te zegeen dat de bases succesvol is aangemaakt.

    public function store(Request $request)
    {
        $this->authorize('create', Base::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'required|url',
            'layout_link' => 'required|url|unique:bases,layout_link',  /// unique is een functionaliteit van Laravel wat ervoor zorgt dat bepaalde records in de db uniek zijn zoals hier de layout link zodat basissen niet dubbel in de DB staan
            'description' => 'required|string',
            'base_type' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id', // exists is ervoor om te zorgen dat deze records aanwezig zijn in de DB (foreign keys), je moet ingelogd zijn namelijk om een basis aan te maken
            'town_hall_id' => 'required|exists:town_halls,id',
        ]);

        try {
            // validatie toegevoegd in plaats van exceptions ( had eerst execptions namelijk), 
            // 404 = not found,  400 = bad request , 409 = conflict, 500 = internal server error.
            $townHall = TownHall::find($request->town_hall_id);
            if (!$townHall) {
                abort(404, 'Invalid townhall level.');
            }

            // zo proberen we te controleren of een gebruiker een goeie link maakt voor de townhall die iemand anders kan kopieren, 
            // in de link van een base zit een TH = level, als het level van th niet overeenkomt met het level waarin je de bases wilt uploaden krijg je een error. 
            preg_match('/TH(\d+)/', $request->layout_link, $matches);
            $extractedTownHallLevel = isset($matches[1]) ? (int)$matches[1] : null;

            if ($extractedTownHallLevel !== $townHall->level) {
                abort(400, 'The layout link does not match the selected Town Hall level.');
            }

            // checken of de basis al bestaat 
            $existingBase = Base::where('name', $request->name)
                ->where('layout_link', $request->layout_link)
                ->first();

            if ($existingBase) {
                abort(409, 'This base already exists in the database.');
            }

            Base::create($request->all());

            return redirect()->route('dashboard')->with('success', 'Base created successfully.');
        } catch (\Exception $e) {
            abort(500, 'Failed to create base. Please try again.');
        }
    }

    // deze methode displayed een basis als je hem aanklikt
    public function show(Base $base)
    {
        return view('bases.show', compact('base'));
    }

    // deze methode returned de edit view waar login gebruikers een basis kunnen updaten
    public function edit(Base $base)
    {
        $this->authorize('update', $base);
        $townHalls = TownHall::all();
        return view('bases.auth.edit', compact('base', 'townHalls'));
    }

    // deze functie zorgt ervoor dat de data van de edit pagina in de DB komt. 
    public function update(Request $request, Base $base)
    {
        $this->authorize('update', $base);

        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'required|url',
            'layout_link' => 'required|url',
            'description' => 'required|string',
            'base_type' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'town_hall_id' => 'required|exists:town_halls,id',
        ]);

        try {
            // zelfde validatie om ervoor te zorgen dat een link dezelfde townhall level heeft op welk level je hem in de DB wilt zetten.
            $townHall = TownHall::find($request->town_hall_id);
            if (!$townHall) {
                return redirect()->back()->withErrors(['town_hall_id' => 'Invalid townhall level.']);
            }
            preg_match('/TH(\d+)/', $request->layout_link, $matches);
            $extractedTownHallLevel = isset($matches[1]) ? (int)$matches[1] : null;

            if ($extractedTownHallLevel !== $townHall->level) {
                return redirect()->back()->withErrors(['layout_link' => 'The layout link does not match the selected Town Hall level.']);
            }

            $base->update($request->all());

            return redirect()->route('dashboard')->with('success', 'Base updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Failed to update base. Please try again.');
        }
    }

    // zorgt ervoor dat een gebruiker de basissen kan beheren die gebruiker heeft aangemaakt
    public function myBases(Request $request)
    {
        $user = Auth::user();
        $query = Base::where('user_id', $user->id);

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('town_hall_id')) {
            $query->where('town_hall_id', $request->town_hall_id);
        }

        $bases = $query->get();
        $townHalls = TownHall::all();

        return view('bases.auth.my-bases', compact('bases', 'townHalls'));
    }
    // deze functie vernietigd de basis 
    public function destroy(Base $base)
    {
        $this->authorize('delete', $base);

        try {
            $base->delete();
            return redirect()->route('dashboard')->with('success', 'Base deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Failed to delete base. Please try again.');
        }
    }
}
