<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LandProperty extends Model
{
    use HasFactory;

    // Status types
    public const PURCHASE_AGREEMENT = 1;
    public const PAID = 2;
    public const REGISTERED = 3;
    public const SOLD = 4;

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

    // Land property status transformation
    public static function landPropertyStatusTypes(): array
    {
        return [
            self::PURCHASE_AGREEMENT => 'Purchase agreement',
            self::PAID => 'Paid',
            self::REGISTERED => 'Registered',
            self::SOLD => 'Sold'
        ];
    }

    // Show property status
    public function getLandPropertyStatus(int $status): string
    {
        return self::landPropertyStatusTypes()[$status];
    }

    // Show land property cadastral number properly if it starts with 0
    public function getLandPropertyZerofill(): string
    {
        return str_pad($this->attributes['cadastral_nr'], 11, '0', STR_PAD_LEFT);
    }

}
