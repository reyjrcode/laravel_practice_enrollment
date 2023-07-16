<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\Professor;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    //php artisan make:controller MembersController
    // php artisan make:resource UserCollection
    //{{DOMAIN}}/api/professors/3/members

    public function index(Request $request, Professor $professor)
    {
        $members = $professor->members;
        return new UserCollection($members);
    }
}