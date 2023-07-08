<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubjectCollection;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function index(Request $request){
        // php artisan make:resource SubjectResource
        // php artisan make:resource SubjectCollection
        return new SubjectCollection(Subject::all());
    }
}
