<?php

namespace App\Http\Controllers;

use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $versions = Version::all();
        return view("versions/index", compact('versions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'titre' => ['required', 'string'],
            'numero' => [
                'required',
                'regex:/^\d+(\.\d{1})?$/',
                function ($attribute, $value, $fail) {
                    $maxVersion = Version::max('numero');

                    if ($maxVersion !== null && floatval($value) <= $maxVersion) {
                        $fail('Le nouveau numéro de version doit être supérieur à ' . $maxVersion . '.');
                    }
                    $wholePart = (int) $value;
                    if ($wholePart >= 100) {
                        $fail('Le numéro de version ne peut pas avoir plus de 2 chiffres avant la virgule.');
                    }
                },
            ],
            'description' => ['nullable', 'string'],
        ]);
    }
    public function create()
    {
        return view('versions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $this->validator($request->all())->validate();
    $latestVersion = Version::orderBy('id', 'desc')->first();
    $latestVersionId = $latestVersion->id;

    DB::transaction(function () use ($latestVersionId, $validatedData) {
    $idVersionCreated = Version::create($validatedData)->id;
        DB::statement("
        INSERT INTO champs (id, champ, format, obligatoire, definitif, nonRenseigne, ordre, parent_id, version_id)
            SELECT id, champ, format, obligatoire, definitif, nonRenseigne, ordre, parent_id, $idVersionCreated
            FROM champs
            WHERE version_id = " . ($latestVersionId) . ";
        ");
        DB::statement("
            INSERT INTO champ_section (txtDescription, champ_id, section_id, regime_id, bloc_alimentation_id, version_id)
            SELECT txtDescription, champ_id, section_id, regime_id, bloc_alimentation_id, $idVersionCreated
            FROM champ_section
            WHERE version_id = " . ($latestVersionId) . ";
        ");
        DB::statement("
            INSERT INTO champ_utilisation (champ_id, utilisation_id, version_id)
            SELECT champ_id, utilisation_id, $idVersionCreated
            FROM champ_utilisation
            WHERE version_id = " . ($latestVersionId) . ";
        ");
    });
    return redirect()->route('versions.index')->with('success', 'La version a été créée avec succès !');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $version = Version::find($id);
        if (!$version) {
            return redirect()->route('versions.index')->with('error', 'La version que vous souhaitez éditer n\'existe pas.');
        }
        return view('versions.edit', compact('version'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $version = Version::find($id);

        if (!$version) {
            return redirect()->route('versions.index')->with('error', 'La version que vous souhaitez mettre à jour n\'existe pas.');
        }
        $request->validate([
            'titre' => ['required', 'string'],
            'numero' => ['required', 'numeric'],
            'description' => ['nullable', 'string'],
        ]);
        $version->update($request->all());
        return redirect()->route('versions.index')->with('success', 'La version a été mise à jour avec succès !');
    }
}
