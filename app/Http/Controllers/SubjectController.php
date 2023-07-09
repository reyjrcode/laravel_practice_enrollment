<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Resources\SubjectCollection;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class SubjectController extends Controller
{
    //
    public function index(Request $request)
    {
        // php artisan make:resource SubjectResource
        // php artisan make:resource SubjectCollection
        // {{DOMAIN}}/api/subjects?filter[is_approved]=0
        // {{DOMAIN}}/api/subjects?sort=title,-is_approved



        $subjects = QueryBuilder::for(Subject::class)
            ->allowedFilters('is_approved')
            ->defaultSort('-created_at')
            ->allowedSorts(['title','is_approved','created_at'])
            ->paginate();
        return new SubjectCollection($subjects);
    }
    public function show(Request $request, Subject $subject)
    {
        return new SubjectResource($subject);
    }
    public function store(StoreSubjectRequest $request)
    {
        $validated = $request->validated();

        $subject = Auth::user()->subjects()->create($validated);
        return new SubjectResource($subject);
    } 
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $validated = $request->validated();
        $subject->update($validated);
        return new SubjectResource($subject);
    }
    public function destroy(Request $request, Subject $subject)
    {
        $subject->delete();
        return response()->noContent();
    }

}