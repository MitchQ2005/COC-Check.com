<?php
namespace App\Http\Controllers;

use App\Models\Base;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    // deze methode zorgt ervoor dat alleen ingelogde gebruikers deze methodes kunnen doen zoals create store and update
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    // index functie om alle basissen te zien
    public function index()
    {
        $bases = Base::all();
        return view('bases.index', compact('bases'));
    }

    // spreekt voor zich, create functie
    public function create()
    {
        $this->authorize('create', Base::class);
        return view('bases.create');
    }

    // store functie, krijgt de $request mee om ervoor te zorgen dat alle velden goed zijn ingevuld
    // en stored ze in de DB. stuurt een return terug om te zegeen dat de bases succesvol is aangemaakt.
    public function store(Request $request)
    {
        $this->authorize('create', Base::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'required|url',
            'layout_link' => 'required|url',
            'description' => 'required|string',
            'base_type' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'town_hall_id' => 'required|exists:town_halls,id',
        ]);

        Base::create($request->all());

        return redirect()->route('bases.index')->with('success', 'Base created successfully.');
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
        return view('bases.edit', compact('base'));
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

        $base->update($request->all());

        return redirect()->route('bases.index')->with('success', 'Base updated successfully.');
    }


    // deze functie vernietigd de basis 
    public function destroy(Base $base)
    {
        $this->authorize('delete', $base);
        $base->delete();

        return redirect()->route('bases.index')->with('success', 'Base deleted successfully.');
    }
}