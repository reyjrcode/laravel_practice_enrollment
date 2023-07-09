<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;
use App\Http\Resources\ProfessorCollection;
use App\Http\Resources\ProfessorResource;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class ProfessorController extends Controller
{
    //
    public function index(Request $request)
    {
        $professors = QueryBuilder::for(Professor::class)
            ->allowedIncludes('subjects')
            ->paginate();

        return new ProfessorCollection($professors);
    }
    public function store(StoreProfessorRequest $request)
    {
        $validated = $request->validated();
        $professor = Auth::user()->professor()->create($validated);
        return new ProfessorResource($professor);
    }
    public function show(Request $request, Professor $professor)
    {
        // {{DOMAIN}}/api/professors?include=subjects
        return (new ProfessorResource($professor))
        ->load('subjects')
        ->load('members');
    }

    public function update(UpdateProfessorRequest $request, Professor $professor)
    {
        $validated = $request->validated();
        $professor->update($validated);
        return new ProfessorResource($professor);
    }
    public function destroy(Request $request, Professor $professor)
    {
        $professor->delete();

        return response()->noContent();
    }
}