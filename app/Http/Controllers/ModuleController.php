<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::with('specialty')
            ->orderBy('specialty_id')
            ->orderBy('sequence')
            ->get();
        return view('dashboard.modules.index', compact('modules'));
    }

    public function create()
    {
        $specialties = Specialty::orderBy('name')->get();
        return view('dashboard.modules.create', compact('specialties'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'specialty_id' => ['required', 'exists:specialties,id'],
            'code'         => ['required', 'string', 'max:20', 'unique:modules'],
            'name'         => ['required', 'string', 'max:255'],
            'coefficient'  => ['required', 'integer', 'min:1', 'max:20'],
            'sequence'     => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Module::create([
            'specialty_id' => $request->specialty_id,
            'code'         => $request->code,
            'name'         => $request->name,
            'coefficient'  => $request->coefficient,
            'sequence'     => $request->sequence,
        ]);

        return redirect()->route('modules.index')
            ->with('success', 'Module créé avec succès !');
    }

    public function edit(Module $module)
    {
        $specialties = Specialty::orderBy('name')->get();
        return view('dashboard.modules.edit', compact('module', 'specialties'));
    }

    public function update(Request $request, Module $module)
    {
        $validator = Validator::make($request->all(), [
            'specialty_id' => ['required', 'exists:specialties,id'],
            'code'         => ['required', 'string', 'max:20', Rule::unique('modules')->ignore($module->id)],
            'name'         => ['required', 'string', 'max:255'],
            'coefficient'  => ['required', 'integer', 'min:1', 'max:20'],
            'sequence'     => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $module->update([
            'specialty_id' => $request->specialty_id,
            'code'         => $request->code,
            'name'         => $request->name,
            'coefficient'  => $request->coefficient,
            'sequence'     => $request->sequence,
        ]);

        return redirect()->route('modules.index')
            ->with('success', 'Module modifié avec succès !');
    }

    public function destroy(Module $module)
    {
        if ($module->evaluations()->exists()) {
            return back()->with('error', 'Impossible de supprimer : ce module a des évaluations associées.');
        }

        $module->delete();

        return redirect()->route('modules.index')
            ->with('success', 'Module supprimé avec succès !');
    }
}
