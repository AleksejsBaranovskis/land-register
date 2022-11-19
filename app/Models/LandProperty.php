<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LandProperty extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'cadastral_nr', 'status'];

    // Relationship with user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with land units
    public function landUnit(): HasMany
    {
        return $this->hasMany(LandUnit::class);
    }
}
