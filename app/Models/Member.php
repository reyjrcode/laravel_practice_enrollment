<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Member extends Pivot
{
    //php artisan make:model Member --pivot --migration
    // $p=Professor::factory()->create()
    // $u=User::factory()->create()
    // $p->members()->attach([$u->id])
    // $p->members()
}
