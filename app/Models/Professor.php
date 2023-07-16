<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Professor extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',

    ];
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class,Member::class);
    }
    // protected static function booted(): void
    // {
    //     static::addGlobalScope('creator', function (Builder $builder) {
    //         $builder->where('creator_id', Auth::id());
    //     });
    //     // $p=Professor::factory()->create()
    //     // $u=User::factory()->create()
    //     // 
    // }
    
}