<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_approved',
        'professor_id'
    ];
    protected $casts = [
        'is_approved' => 'boolean',

    ];
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    public function professor(): BelongsTo
    {
        return $this->belongsTo(Professor::class);
    }
    protected static function booted(): void
    {
        // $p = Professor::factory()->create()
        // User::factory()->create() 
        // $p->members()-> attach([4])
        // User::find(3)

        static::addGlobalScope('member', function (Builder $builder) {
            $builder->where('creator_id', Auth::id())
                ->orWhereIn('professor_id', Auth::user()->memberships->pluck('id'));
        });
    }


}