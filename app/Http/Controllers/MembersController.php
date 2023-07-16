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
    public function store(Request $request, Professor $professor)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $professor->members()->syncWithoutDetaching([$request->user_id]);

        $members = $professor->members;

        return new UserCollection($members);
    }
    public function destroy(Request $request, Professor $professor, int $member)
    {
        abort_if($professor->creator_id === $member, 400, 'Cannot remove creator from project.');

        $professor->members()->detach([$member]);

        $members = $professor->members;

        return new UserCollection($members);
    }
}