<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;
use App\Http\Resources\ProfessorResource;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    //
    public function store(StoreProfessorRequest $request)
    {
        $validated = $request->validated();
        $professor = Auth::user()->professor()->create($validated);
        return new ProfessorResource($professor);
    }
    public function show(Request $request, Professor $professor)
    {
        return new ProfessorResource($professor);
    }

    public function update(UpdateProfessorRequest $request, Professor $professor)
    {
        $validated = $request->validated();
        $professor->update($validated);
        return new ProfessorResource($professor);
    }
}