<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const INDIVIDUAL = 1;
    public const COMPANY = 2;

    protected $fillable = ['name', 'identification_nr/registration_nr', 'type'];

    // Relationship with land properties
    public function landProperty(): HasMany
    {
        return $this->hasMany(LandProperty::class);
    }

    // User type transformation
    public static function userTypes(): array
    {
        return [
            self::INDIVIDUAL => 'Individual',
            self::COMPANY => 'Company'
        ];
    }

    // Show user type
    public function getUserType(int $type): string
    {
        return self::userTypes()[$type];
    }

    // Show user id/reg.nr properly if it starts with 0
    public function getUserIdZerofill(): string
    {
        return str_pad($this->attributes['identification_nr/registration_nr'], 11, '0', STR_PAD_LEFT);
    }

    // Get user land property total area
    public function getLandPropertiesTotalArea(): float
    {
        $sum = 0;
        foreach ($this->landProperty as $property){
            $sum+=$property->landUnit()->sum('total_area(ha)');
        }
        return $sum;
    }
}
