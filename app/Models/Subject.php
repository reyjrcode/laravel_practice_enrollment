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
        'is_approved'
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
        static::addGlobalScope('creator', function (Builder $builder) {
            $builder->where('creator_id', Auth::id());
        });
    }


}