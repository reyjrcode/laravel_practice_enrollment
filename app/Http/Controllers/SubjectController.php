<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Resources\SubjectCollection;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function index(Request $request)
    {
        // php artisan make:resource SubjectResource
        // php artisan make:resource SubjectCollection
        return new SubjectCollection(Subject::all());
    }
    public function show(Request $request, Subject $subject)
    {
        return new SubjectResource($subject);
    }
    public function store(StoreSubjectRequest $request)
    {
        $validated = $request->validated();

        $subject = Subject::create($validated);
        return new SubjectResource($subject);
    }
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $validated = $request->validated();
        $subject->update($validated);
        return new SubjectResource($subject);
    }

}