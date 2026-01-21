<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SpecialtyController extends Controller
{
    public function index()
    {
        $specialties = Specialty::orderBy('name')->get();
        return view('dashboard.specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('dashboard.specialties.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code'        => ['required', 'string', 'max:20', 'unique:specialties'],
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Specialty::create([
            'code'        => $request->code,
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('specialties.index')
            ->with('success', 'Spécialité créée avec succès !');
    }

    public function edit(Specialty $specialty)
    {
        return view('dashboard.specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty)
    {
        $validator = Validator::make($request->all(), [
            'code'        => ['required', 'string', 'max:20', Rule::unique('specialties')->ignore($specialty->id)],
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $specialty->update([
            'code'        => $request->code,
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('specialties.index')
            ->with('success', 'Spécialité modifiée avec succès !');
    }

    public function destroy(Specialty $specialty)
    {
        if ($specialty->students()->exists() || $specialty->teachers()->exists() || $specialty->modules()->exists()) {
            return back()->with('error', 'Impossible de supprimer : cette spécialité est liée à des étudiants, enseignants ou modules.');
        }

        $specialty->delete();

        return redirect()->route('specialties.index')
            ->with('success', 'Spécialité supprimée avec succès !');
    }
}
