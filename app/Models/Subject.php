<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'is_approved'
    ];
    protected $casts=[
        'is_approved'=>'boolean',

    ];
}
